<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use App\Http\Controllers\Controller;
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

    $product = Product::where('slug', $slug)->firstOrFail();
    $data['related'] = Product::where('category_id', $product->category_id)->take(10)->get();

    preg_match('/<p>(.*?)<\/p>/s', $product->description, $matches);
    $product->tagline = $matches[0] ?? '';
    $data['product'] = $product;
    $url = route('users.products', ['slug' => $product->slug]);

    return inertia('Users/Carts/ProductDetails', 
      [
        'data' => $data,
        'pageMeta' => [
            'url' => $url,
            'title' => $product->name."Buy Online in Nigeria | Sanlive Pharmacy",
            'metaTitle' => "Buy $product->name Online in Nigeria | Sanlive Pharmacy",
            'description' => "Shop $product->name online at Sanlive Pharmacy. Trusted  medication. Nationwide delivery across Nigeria. Affordable & authentic",
            'keywords' => " Shop high-quality  online at Sanlive Pharmacy. Fast delivery across Nigeria. Affordable and trusted brands",
            'image_url' => asset('images/products/'.$product->image_path)
        ],
        'schema' => $this->addTags($product),
         'avatar' => 'https://i.pravatar.cc/40?u=1',
         'averageRating' => '',
         'totalRatings' => '',
         'ratingsCount' => '',
         'reviews' => ''
      ]);
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


    public function addTags($product)
    {
        $schema = [
        "@context" => "https://schema.org",
        "@type" => "Product",
        "name" => $product->name,
        "image" => url("images/products/{$product->image_path}"),
        "description" => Str::limit(strip_tags($product->description), 160),
        "brand" => [
            "@type" => "Brand",
            "name" => 'Sanlive Pharmacy'
        ],
        "offers" => [
            "@type" => "Offer",
            "url" => url("/products/{$product->slug}"),
            "priceCurrency" => "NGN",
            "price" => $product->sale_price,
            "availability" => "https://schema.org/InStock"
        ]
    ];
    return $schema;
    }
}
