<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;

class ProductDetailsController extends Controller
{
    public function __invoke($id)
    {
      try{
      $id = explode('-',$id);
      $id = array_pop($id);
      $ss =   Hashids::connection('products')->decode($id);
      $product = Product::findorfail($ss[0]);
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
      return inertia('Users/Carts/ProductDetails', 
      [
        'data' => $data,
        'pageMeta' => [
            'url' => url()->current(),
            'title' => Str::slug($product->name, ' '),
            'metaTitle' => Str::slug($product->name, ' '),
            'description' => Str::slug($product->description, ' '),
            'keywords' => Str::slug($product->name).', online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => asset('images/products/'.$product->image_path)
        ]
      ]);
      }catch(\Exception $e)
      {
          return inertia('404');
      }
    }
}
