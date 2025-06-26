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
            'title' => $product->name,
            'metaTitle' => $product->name,
            'description' => $product->description,
            'keywords' => $product->name.', online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => asset('images/products/'.$product->image_path)
        ]
      ]);

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
          return inertia('404');
      }
    }
}
