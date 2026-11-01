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

    $product = Product::with(['productReviews' => fn ($q) => $q->where('is_approved', 1)->latest()])
        ->where('slug', $slug)
        ->firstOrFail();

 
    $data['related'] = Product::where('category_id', $product->category_id)
        ->whereKeyNot($product->id)
        ->orderByRaw('status = 1')            // in-stock first
        ->latest()
        ->take(8)
        ->get();

    $data['product'] = $product;
    $url = route('users.products', ['slug' => $product->slug]);
    $approvedReviews = $product->productReviews;   // approved only
    $reviews = ProductReview::where(['product_id' => $product->id, 'is_approved' => 1])->latest();

    $amount  = (float) ($product->sale_price ?: $product->price ?: 0);
    $price   = '₦' . number_format($amount);
    $inStock = (int) $product->status !== 1;

    $metaTitle = $this->seoTitle($product->name);

    $lead = "Buy genuine {$product->name} in Nigeria"
          . ($amount > 0 ? " at {$price}. " : '. ')
          . ($inStock ? 'In stock with delivery in Lagos, Abuja & nationwide.' : 'Currently out of stock.');
    $room = 155 - mb_strlen($lead) - 1;
    $plainDescription = $room > 30
        ? rtrim($lead . ' ' . $this->excerpt($product->description, $room))
        : $lead;

    $meta = [
            'url'      => $url,
            'title'    => $metaTitle,
            'metaTitle'=> $metaTitle,
            'description' => $plainDescription,
            'image_url'=> $product->image_path ? asset('images/products/'.$product->image_path) : null,
            'og_type'  => 'product',
            'robots'   => 'index, follow',
    ];

    return view('frontend.product-details', [
        'data' => $data,
        'pageMeta' => $meta,
        'schema' => $this->addTags($product, $approvedReviews, $plainDescription, $inStock),
        'avatar' => 'https://i.pravatar.cc/40?u=1',
        'reviews' => $reviews->paginate(5),
        'ratings' => $approvedReviews->pluck('rating'),
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


    private function seoTitle(string $name): string
    {
        foreach ([
            "{$name} Price in Nigeria – Genuine | Sanlive Pharmacy",
            "{$name} Price in Nigeria | Sanlive Pharmacy",
            "{$name} Price in Nigeria",
        ] as $candidate) {
            if (mb_strlen($candidate) <= 60) return $candidate;
        }
        return $name;
    }

    private function excerpt(?string $html, int $limit): string
    {
        // strip tags first, then decode — keeps text like "<5 years" and "500mg/5ml" intact
        $text = html_entity_decode(strip_tags($html ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = trim(preg_replace('/\s+/u', ' ', $text));

        if (mb_strlen($text) <= $limit) return $text;

        $cut  = mb_substr($text, 0, $limit - 1);
        $last = mb_strrpos($cut, ' ');
        return rtrim(mb_substr($cut, 0, $last ?: mb_strlen($cut)), " ,.;:-") . '…';
    }


    public function addTags(Product $product, \Illuminate\Support\Collection $reviews, string $description, bool $inStock = true): string
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
            ->url($productUrl)
            ->image(url("images/products/" . rawurlencode($product->image_path)))
            ->description($description)
            ->sku($product->sku ?? (string) $product->id)
            ->itemCondition('https://schema.org/NewCondition')
            ->brand(
                Schema::brand()->name($product->brand ?? 'Sanlive Pharmacy')
            );

        // Always attach an offers block — Google requires at least one of offers/review/aggregateRating.
        $offer = Schema::offer()
            ->url($productUrl)
            ->priceCurrency('NGN')
            ->availability($inStock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock')
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
