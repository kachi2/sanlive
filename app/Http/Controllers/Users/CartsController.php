<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Vinkla\Hashids\Facades\Hashids;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    //
use imageUpload;
    public function add(Request $request, $id)
     {   
         $product = Product::find($id);
         if(isset($request->image)){
            $file = $this->UploadImage($request, 'images/carts/');
         }
         $id = Auth::user()?->id;
         if(!$id)
         {
          $id = rand(11,99);
         }

       $response =  \Cart::add([
          'id' => $product->id,
          'name' => $product->name,
          'price' => $product->sale_price,
          'quantity' => $request->qty,
          'attributes' => array([
            'image' => $file??'',
            'modelImage' => $product->image_path
          ]),
          'associatedModel' => $product->with('category')
      ]);
    
         if($response){
        return redirect()->back();

         }
     }

     public function CartTest(Request $request){
      return $request;
     }



    public function Index()
    { 
      $prod = Product::latest()->take(6)->get();
      foreach($prod as $pp){
        $pp->productUrl = trimInput($pp->name);
        $pp->hashid = Hashids::connection('products')->encode($pp->id);
      }
        return inertia('Users/Carts/Cart', [
          'carts' => \Cart::getContent(),
          'latest' => $prod,
          'cartSession' => Hashids::connection('products')->encode(rand(11,99))
        ]);
    }




    public function destroy( $id)
    {
      //dd($id.' '.$request->rowId);
        Cart::remove($id);
        Session::flash('alert', 'error');
        Session::flash('msg', 'Cart Successfully removed');
        return back();
    }

    public function update(Request $request){
        $cartItemId = $request->cartId;
        $quantity = $request->qty;
        // Update the cart item quantity
        Cart::update($cartItemId, $quantity);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Cart item quantity updated successfully');
        return back();
    }
}
