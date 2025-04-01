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
          'associatedModel' => $product->load('category')
      ]);
    
         if($response){
          Session::flash('success', 'Cart Added Successfully');
        return redirect()->back()->with('message', 'Cart Added Successfully');
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
          'total' => \Cart::getTotal(),
          'latest' => $prod,
          'cartSession' => Hashids::connection('products')->encode(rand(11,99))
        ]);
    }




    public function destroy( $id)
    {
      //dd($id.' '.$request->rowId);
        \Cart::remove($id);
        Session::flash('error', '1 Item removed from the Cart');
        return back();
    }

    public function update(Request $request){
        $cartItemId = $request->cartId;
        $quantity = $request->qty;
        // dd($cartItemId);
        if($request->action == "+")
        { \Cart::update($cartItemId, array('quantity' => +1));
        Session::flash('success', '1 Item added to the Cart');
        return back();
        }
  
        if($request->action == "-" && $quantity > 1 ) {
        \Cart::update($cartItemId, array('quantity' => -1));
        Session::flash('error', '1  Item removed from the Cart');
        return back();
        }
    }
}
