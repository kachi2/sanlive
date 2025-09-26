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
            'url' => $url,
            'title' => $product->name." Buy Online in Nigeria | Sanlive Pharmacy",
            'metaTitle' => "Buy $product->name Online in Nigeria | Sanlive Pharmacy",
            'description' => "Shop $product->name Order prescription drugs, supplements & personal care from Sanlive Pharmacy. Affordable prices, genuine products & doorstep delivery in Nigeria.",
            'keywords' => " $product->name Shop high-quality  online at Sanlive Pharmacy. Fast delivery across Nigeria. Affordable and trusted brands",
            'image_url' => asset('images/products/'.$product->image_path)
    ];
    return inertia('Users/Carts/ProductDetails', 
      [
        'data' => $data,
        'pageMeta' => $meta,
        'schema' => $this->addTags($product, $reviews->get()),
         'avatar' => 'https://i.pravatar.cc/40?u=1',
         'reviews' => $reviews->paginate(5),
         'ratings' => ProductReview::where(['product_id' => $product->id, 'is_approved' => 1])->pluck('rating') 
      ])->withViewData($meta);
      }catch(\Exception $e)
      {
        return inertia('404')->toResponse(request())->setStatusCode(404);
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
        
        return inertia('404')->toResponse(request())->setStatusCode(404);
      }
    }


    public function addTags($product, $reviews)
    {
       
     $schema = [
    "@context" => "https://schema.org",
    "@type" => "Product",
    "name" => $product->name,
    "image" => url("images/products/{$product->image_path}"),
    "description" => Str::limit(strip_tags($product->description), 160),
    "brand" => [
        "@type" => 'brand' ,
        "name" => $product->brand??'Sanlive Pharmacy'
    ],
    "offers" => [
        "@type" => "Offer",
        "url" => url("/products/{$product->slug}"),
        "priceCurrency" => "NGN",
        "price" => $product->sale_price,
        "availability" => "https://schema.org/InStock",
        "priceValidUntil" => now()->addYear()->format('Y-m-d'),

        // ✅ Move return policy inside offers
        "hasMerchantReturnPolicy" => [
            "@type" => "MerchantReturnPolicy",
            "applicableCountry" => "NG",
            "returnPolicyCategory" => "https://schema.org/MerchantReturnFiniteReturnWindow",
            "merchantReturnDays" => 2,
            "returnMethod" => "https://schema.org/ReturnByMail",
            "returnFees" => "https://schema.org/FreeReturn"
        ],

        // ✅ Move shipping details inside offers
        "shippingDetails" => [
            "@type" => "OfferShippingDetails",
            "shippingRate" => [
                "@type" => "MonetaryAmount",
                "value" => "8000",
                "currency" => "NGN"
            ],
            "deliveryTime" => [
                "@type" => "ShippingDeliveryTime",
                "handlingTime" => [
                    "@type" => "QuantitativeValue",
                    "minValue" => 1,
                    "maxValue" => 2,
                    "unitCode" => "d"  // days
                ],
                "transitTime" => [
                    "@type" => "QuantitativeValue",
                    "minValue" => 2,
                    "maxValue" => 5,
                    "unitCode" => "d"  // days
                ]
            ],
            "shippingDestination" => [
                "@type" => "DefinedRegion",
                "addressCountry" => "NG"
            ]
        ]
    ],
];

return $schema;


}

}
