<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\Graph;

class ProductDetailsController extends Controller
{

  public function Show(string $slug)
  {
     try{
    $parts = explode('-', $slug);
    $possibleHashid = end($parts); 

    $check = Hashids::connection('products')->decode($possibleHashid);

    if (!empty($check)) {
        $product = Product::findOrFail($check[0]);
        return redirect()->to("/products/{$product->slug}", 301);
    }

    $product = Product::with('productReviews')->where('slug', $slug)->firstOrFail();
    $data['related'] = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(8)->get();

    preg_match('/<p>(.*?)<\/p>/s', $product->description, $matches);
    $product->tagline = $matches[0] ?? '';
    $data['product'] = $product;
    $url = route('users.products', ['slug' => $product->slug]);
    $reviews = ProductReview::where(['product_id' => $product->id, 'is_approved' => 1])->latest();

    $meta = [
            'url'      => $url,
            'title'    => $product->name.' | Sanlive Pharmacy Nigeria',
            'metaTitle'=> 'Buy '.$product->name.' in Nigeria',
            'description' => 'Order '.$product->name.' from Sanlive Pharmacy. Genuine product, affordable price & fast doorstep delivery across Nigeria. PCN licensed.',
            'keywords' => $product->name.', buy '.$product->name.' Nigeria, '.$product->name.' online pharmacy',
            'image_url'=> asset('images/products/'.$product->image_path),
            'og_type'  => 'product',
            'robots'   => 'index, follow',
    ];

    // dd($data);
    return view('frontend.product-details', [
        'data' => $data,
        'pageMeta' => $meta,
        'schema' => $this->addTags($product, $reviews->get()),
        'avatar' => 'https://i.pravatar.cc/40?u=1',
        'reviews' => $reviews->paginate(5),
        'ratings' => ProductReview::where(['product_id' => $product->id, 'is_approved' => 1])->pluck('rating'),
    ]);
      }catch(\Exception $e)
      {
        abort(404);
      }
  } 



    public function redirectOldUrl(string $id, ?string $url = null)
    {
      try{
      $ss =   Hashids::connection('products')->decode($id);
      $product = Product::findorfail($ss[0]);
       $correctSlug = Str::slug($product->name);
        if ($url !== $correctSlug) {
            return Redirect::to("/products/$product->slug", 301);
        }
        
      $data['related'] = Product::where('category_id', $product->category->id)->take(10)->get();
      $product->hashid = Hashids::connection('products')->encode($product->id);
      $product->productUrl =  Str::slug($product->name);
       preg_match('/<p>(.*?)<\/p>/s', $product->description, $matches);
       $product->tagline =$matches[0]??'';
      $data['product'] = $product;
  
      foreach($data['related']  as $prod){
        $prod->hashid = Hashids::connection('products')->encode($prod->id);
        $prod->productUrl =  Str::slug($prod->name);
        $keywords[] = Str::slug($prod->name);
      }
      
       return Redirect::to("/products/{$product->slug}", 301);
      }catch(\Exception $e)
      {
        abort(404);
      }
    }


    public function addTags(Product $product, \Illuminate\Support\Collection $reviews): string
    {
        $reviewCount = $reviews->count();
        $avgRating   = $reviewCount > 0 ? round($reviews->avg('rating'), 1) : null;

        $category    = $product->category;
        $categoryUrl = url('/catalogs/' . ($category->slug ?? $category->id));
        $productUrl  = url("/products/{$product->slug}");

        $graph = new Graph();

        $price = (float) ($product->sale_price ?? 0);

        $productNode = $graph->product()
            ->name($product->name)
            ->image(url("images/products/" . rawurlencode($product->image_path)))
            ->description(Str::limit(strip_tags($product->description), 160))
            ->sku($product->sku ?? (string) $product->id)
            ->itemCondition('https://schema.org/NewCondition')
            ->brand(
                Schema::brand()->name($product->brand ?? 'Sanlive Pharmacy')
            );

        // Only attach offers when we have a valid price — an empty/null price causes
        // Google to silently drop the offers block and flag the Product as missing offers.
        if ($price > 0) {
            $productNode->offers(
                Schema::offer()
                    ->url($productUrl)
                    ->priceCurrency('NGN')
                    ->price($price)
                    ->availability('https://schema.org/InStock')
                    ->priceValidUntil(now()->addYear()->format('Y-m-d'))
                    ->seller(
                        Schema::organization()->name('Sanlive Pharmacy')->url(url('/'))
                    )
                    ->hasMerchantReturnPolicy(
                        Schema::merchantReturnPolicy()
                            ->applicableCountry('NG')
                            ->returnPolicyCategory('https://schema.org/MerchantReturnFiniteReturnWindow')
                            ->merchantReturnDays(2)
                            ->returnMethod('https://schema.org/ReturnByMail')
                            ->returnFees('https://schema.org/FreeReturn')
                    )
                    ->shippingDetails(
                        Schema::offerShippingDetails()
                            ->shippingRate(
                                Schema::monetaryAmount()->value(8000)->currency('NGN')
                            )
                            ->deliveryTime(
                                Schema::shippingDeliveryTime()
                                    ->handlingTime(
                                        Schema::quantitativeValue()->minValue(1)->maxValue(2)->unitCode('d')
                                    )
                                    ->transitTime(
                                        Schema::quantitativeValue()->minValue(2)->maxValue(5)->unitCode('d')
                                    )
                            )
                            ->shippingDestination(
                                Schema::definedRegion()->addressCountry('NG')
                            )
                    )
            );
        }

        if ($avgRating !== null) {
            $productNode->aggregateRating(
                Schema::aggregateRating()
                    ->ratingValue($avgRating)
                    ->reviewCount($reviewCount)
                    ->bestRating(5)
                    ->worstRating(1)
            );
        }

        $graph->breadcrumbList()
            ->itemListElement([
                Schema::listItem()->position(1)->name('Home')->item(url('/')),
                Schema::listItem()->position(2)->name($category->name ?? 'Products')->item($categoryUrl),
                Schema::listItem()->position(3)->name($product->name)->item($productUrl),
            ]);

        return $graph->toScript();
    }

}
