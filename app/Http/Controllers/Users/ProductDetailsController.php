<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;

class ProductDetailsController extends Controller
{
    public function __invoke($id, $url)
    {
      $ss =   Hashids::connection('products')->decode($id);
      $product = Product::findorfail($ss[0]);
      session()->push('products.recently_viewed', $product->getKey());
      $data['related'] = Product::where('category_id', $product->category->id)->take(10)->get();
      $product->hashid = Hashids::connection('products')->encode($product->id);
      $product->productUrl =  trimInput($product->name);
       preg_match('/<p>(.*?)<\/p>/s', $product->description, $matches);
       $product->tagline =$matches[0]??'';
      $data['product'] = $product;
      $products = session()->get('products.recently_viewed');
      $datas = array_slice(array_unique($products), -5, 5, true);
      $data['recent'] = Product::whereIn('id', $datas)->take(5)->get();
     
      foreach($data['related']  as $prod){
        $prod->hashid = Hashids::connection('products')->encode($prod->id);
        $prod->productUrl =  trimInput($prod->name);
      }
      return inertia('Users/Carts/ProductDetails', 
      [
        'data' => $data,
        'metaTitle' => Str::slug($product->name),
        'metaTitle' => Str::slug($product->name),
        'metaDescription' => Str::slug($product->description, ' '),
        'metaDescription' => Str::slug($product->description, ' '),
        'ogTitle' => Str::slug($product->name, ' '),
        'ogDescription' => Str::slug($product->description, ''),
        'ogImage' => asset('images/products/'.$product->image_path),
        'twitterTitle' => Str::slug($product->name, ''),
        'twitterDescription' => Str::slug($product->description, ' '),
        'twitterImage' => asset('images/products/'.$product->image_path)
      ]);
    }
}
