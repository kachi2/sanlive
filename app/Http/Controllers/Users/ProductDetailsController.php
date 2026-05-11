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

    // Extract first meaningful block (p, div, li) for the above-fold tagline
    preg_match('/<(p|div|li|h[1-6])[^>]*>(.*?)<\/\1>/si', $product->description ?? '', $matches);
    $product->tagline = isset($matches[0]) ? '<p>' . strip_tags($matches[2]) . '</p>' : '';
    $data['product'] = $product;
    $url = route('users.products', ['slug' => $product->slug]);
    $reviews = ProductReview::where(['product_id' => $product->id, 'is_approved' => 1])->latest();

    // Noindex thin-content pages until descriptions are enriched
    $descriptionLength = strlen(strip_tags($product->description ?? ''));
    $robotsDirective   = $descriptionLength >= 150 ? 'index, follow' : 'noindex, follow';

    // Use the product's own description as meta description — unique per product
    $plainDescription = trim(strip_tags($product->description ?? ''));
    $autoDesc = $plainDescription
        ? Str::limit($plainDescription, 160)
        : 'Order '.$product->name.' from Sanlive Pharmacy. Genuine product, affordable price & fast doorstep delivery across Nigeria. PCN licensed.';

    // Build keyword-rich title variants
    $category  = $product->category->name ?? 'Medicine';
    $brand     = $product->brand ?? '';
    $metaTitle = 'Buy '.$product->name.($brand ? ' by '.$brand : '').' in Nigeria | Sanlive Pharmacy';

    $meta = [
            'url'      => $url,
            'title'    => $product->name.' | Sanlive Pharmacy Nigeria',
            'metaTitle'=> $metaTitle,
            'description' => $autoDesc,
            'keywords' => $product->name.', buy '.$product->name.' Nigeria, '.$product->name.' price Nigeria, '.$category.' Nigeria, online pharmacy Nigeria',
            'image_url'=> asset('images/products/'.$product->image_path),
            'og_type'  => 'product',
            'robots'   => $robotsDirective,
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

        // Fall back to regular price when sale_price is absent or zero.
        $price = (float) ($product->sale_price ?: $product->price ?: 0);

        $productNode = $graph->product()
            ->name($product->name)
            ->image(url("images/products/" . rawurlencode($product->image_path)))
            ->description(Str::limit(strip_tags($product->description), 160))
            ->sku($product->sku ?? (string) $product->id)
            ->itemCondition('https://schema.org/NewCondition')
            ->brand(
                Schema::brand()->name($product->brand ?? 'Sanlive Pharmacy')
            );

        // Always attach an offers block — Google requires at least one of offers/review/aggregateRating.
        $offer = Schema::offer()
            ->url($productUrl)
            ->priceCurrency('NGN')
            ->availability('https://schema.org/InStock')
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
            );

        if ($price > 0) {
            $offer->price($price)->priceValidUntil(now()->addYear()->format('Y-m-d'));
        }

        $productNode->offers($offer);

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
