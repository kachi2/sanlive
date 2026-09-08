<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Setting;
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
         if($product->requires_prescription == 1 && !$request->hasFile('image')){
            if($request->ajax()){
                return response()->json(['success' => false, 'message' => 'Please upload a doctor\'s prescription for this product before adding it to your cart'], 422);
            }
            Session::flash('error', 'Please upload a doctor\'s prescription for this product before adding it to your cart');
            return redirect()->back();
         }
         if($request->hasFile('image')){
            $request->validate(['image' => 'image']);
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
          'attributes' => [
            'image' => $file??'',
            'modelImage' => $product->image_path
          ],
          'associatedModel' => $product->load('category')
      ]);

         if($response){
          if($request->ajax()){
            return response()->json([
                'success' => true,
                'message' => 'Cart Added Successfully',
                'cartCount' => \Cart::getTotalQuantity(),
                'cartTotalFormatted' => moneyFormat(\Cart::getTotal()),
                'html' => view('frontend.partials.floating-cart-content')->render(),
                'item' => [
                    'name' => $product->name,
                    'image' => asset('images/products/'.$product->image_path),
                    'price' => moneyFormat($product->sale_price),
                    'qty' => (int) $request->qty,
                ],
            ]);
          }
          Session::flash('success', 'Cart Added Successfully');
        return redirect()->back()->with('message', 'Cart Added Successfully');
         }
     }

     public function CartTest(Request $request){
      return $request;
     }



    public function Index()
    { 
      $settings = Setting::first();
 try{
      $prod = Product::latest()->take(4)->get();
      foreach($prod as $pp){
        $pp->productUrl = trimInput($pp->name);
        $pp->hashid = Hashids::connection('products')->encode($pp->id);
        $keyworkds[] = $pp->name;
      }
      $keyworkds =  implode(',', $keyworkds);
      $metas = [
            'url' => url()->current(),
            'title' => 'Carts | Index',
            'metaTitle' => 'Buy medical products, order fast, get fast delivery ',
            'description' => websiteName()." $keyworkds Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices",
            'keywords' => $keyworkds,
            'image_url' => websiteLogo()
      ];
  
        return view('frontend.cart', [
          'carts' => \Cart::getContent(),
          'total' => \Cart::getTotal(),
          'latest' => $prod,
          'cartSession' => Hashids::connection('products')->encode(rand(11,99)),
          'pageMeta' => $metas
        ]);
      
          }catch(\Exception $e)
      {
        abort(404);
      }
    }




    public function destroy(Request $request, $id)
    {
        \Cart::remove($id);
        if($request->ajax()){
            return response()->json([
                'success' => true,
                'cartCount' => \Cart::getTotalQuantity(),
                'cartTotalFormatted' => moneyFormat(\Cart::getTotal()),
                'html' => view('frontend.partials.floating-cart-content')->render(),
            ]);
        }
        Session::flash('error', '1 Item removed from the Cart');
        return back();
    }

    public function update(Request $request){
        $cartItemId = $request->cartId;
        $quantity = $request->qty;
        if($request->action == "+")
        {
        \Cart::update($cartItemId, array('quantity' => +1));
        if($request->ajax()){
            return response()->json([
                'success' => true,
                'cartCount' => \Cart::getTotalQuantity(),
                'cartTotalFormatted' => moneyFormat(\Cart::getTotal()),
                'html' => view('frontend.partials.floating-cart-content')->render(),
            ]);
        }
        Session::flash('success', '1 Item added to the Cart');
        return back();
        }

        if($request->action == "-" && $quantity > 1 ) {
        \Cart::update($cartItemId, array('quantity' => -1));
        if($request->ajax()){
            return response()->json([
                'success' => true,
                'cartCount' => \Cart::getTotalQuantity(),
                'cartTotalFormatted' => moneyFormat(\Cart::getTotal()),
                'html' => view('frontend.partials.floating-cart-content')->render(),
            ]);
        }
        Session::flash('error', '1  Item removed from the Cart');
        return back();
        }

        if($request->ajax()){
            return response()->json([
                'success' => true,
                'cartCount' => \Cart::getTotalQuantity(),
                'cartTotalFormatted' => moneyFormat(\Cart::getTotal()),
                'html' => view('frontend.partials.floating-cart-content')->render(),
            ]);
        }
    }
}
