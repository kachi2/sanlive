<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;

class ProductDetailsController extends Controller
{

  public function Show($slug)
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
    $data['related'] = Product::where('category_id', $product->category_id)->take(10)->get();

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
    // return inertia('Users/Carts/ProductDetails', [
    //   'data' => $data, 'pageMeta' => $meta, 'schema' => $this->addTags($product, $reviews->get()),
    //   'avatar' => 'https://i.pravatar.cc/40?u=1', 'reviews' => $reviews->paginate(5),
    //   'ratings' => ProductReview::where(['product_id' => $product->id, 'is_approved' => 1])->pluck('rating')
    // ])->withViewData($meta); // Vue/Inertia preserved
    return view('frontend.product-details', [
        'data' => $data,
        'pageMeta' => $meta,
        'schema' => json_encode($this->addTags($product, $reviews->get())),
        'avatar' => 'https://i.pravatar.cc/40?u=1',
        'reviews' => $reviews->paginate(5),
        'ratings' => ProductReview::where(['product_id' => $product->id, 'is_approved' => 1])->pluck('rating'),
    ]);
      }catch(\Exception $e)
      {
        // return inertia('404')->toResponse(request())->setStatusCode(404); // Vue/Inertia preserved
        abort(404);
      }
  } 



    public function redirectOldUrl($id, $url = null)
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
        // return inertia('404')->toResponse(request())->setStatusCode(404); // Vue/Inertia preserved
        abort(404);
      }
    }


    public function addTags($product, $reviews)
    {
        $reviewCount = $reviews->count();
        $avgRating   = $reviewCount > 0 ? round($reviews->avg('rating'), 1) : null;

        $category     = $product->category;
        $categoryUrl  = url('/catalogs/' . ($category->slug ?? $category->id));
        $productUrl   = url("/products/{$product->slug}");

        $productSchema = [
            "@type"       => "Product",
            "name"        => $product->name,
            "image"       => url("images/products/{$product->image_path}"),
            "description" => Str::limit(strip_tags($product->description), 160),
            "sku"         => $product->sku ?? (string) $product->id,
            "brand"       => [
                "@type" => "Brand",
                "name"  => $product->brand ?? 'Sanlive Pharmacy',
            ],
            "offers" => [
                "@type"           => "Offer",
                "url"             => $productUrl,
                "priceCurrency"   => "NGN",
                "price"           => (string) $product->sale_price,
                "availability"    => "https://schema.org/InStock",
                "priceValidUntil" => now()->addYear()->format('Y-m-d'),
                "hasMerchantReturnPolicy" => [
                    "@type"                  => "MerchantReturnPolicy",
                    "applicableCountry"      => "NG",
                    "returnPolicyCategory"   => "https://schema.org/MerchantReturnFiniteReturnWindow",
                    "merchantReturnDays"     => 2,
                    "returnMethod"           => "https://schema.org/ReturnByMail",
                    "returnFees"             => "https://schema.org/FreeReturn",
                ],
                "shippingDetails" => [
                    "@type" => "OfferShippingDetails",
                    "shippingRate" => [
                        "@type"    => "MonetaryAmount",
                        "value"    => "8000",
                        "currency" => "NGN",
                    ],
                    "deliveryTime" => [
                        "@type" => "ShippingDeliveryTime",
                        "handlingTime" => [
                            "@type"    => "QuantitativeValue",
                            "minValue" => 1,
                            "maxValue" => 2,
                            "unitCode" => "d",
                        ],
                        "transitTime" => [
                            "@type"    => "QuantitativeValue",
                            "minValue" => 2,
                            "maxValue" => 5,
                            "unitCode" => "d",
                        ],
                    ],
                    "shippingDestination" => [
                        "@type"          => "DefinedRegion",
                        "addressCountry" => "NG",
                    ],
                ],
            ],
        ];

        if ($avgRating !== null) {
            $productSchema["aggregateRating"] = [
                "@type"       => "AggregateRating",
                "ratingValue" => $avgRating,
                "reviewCount" => $reviewCount,
                "bestRating"  => 5,
                "worstRating" => 1,
            ];
        }

        $breadcrumbSchema = [
            "@type"           => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type"    => "ListItem",
                    "position" => 1,
                    "name"     => "Home",
                    "item"     => url('/'),
                ],
                [
                    "@type"    => "ListItem",
                    "position" => 2,
                    "name"     => $category->name ?? 'Products',
                    "item"     => $categoryUrl,
                ],
                [
                    "@type"    => "ListItem",
                    "position" => 3,
                    "name"     => $product->name,
                    "item"     => $productUrl,
                ],
            ],
        ];

        return [
            "@context" => "https://schema.org",
            "@graph"   => [$productSchema, $breadcrumbSchema],
        ];
    }

}
