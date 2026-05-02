<?php

namespace App\Http\Controllers\Users;

use App\Events\CartItemsEvent;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Services\RegisterUser;
use Illuminate\Support\Str;
use App\Models\CountryCurrency;
use App\Traits\CalculateShipping;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;

class CheckoutController extends Controller
{
    use CalculateShipping;

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function Index($cartSession = null){

        try{
        Session::put('cartSession', $cartSession);
       if(!auth::check()){
            $check = new RegisterUser;
           return  $check->viewCheckout();
        }
        if(count(\Cart::getContent()) <= 0 || empty(\Cart::getContent())){
            return to_route('users.index');
        }
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        if(!isset($address)){
            Session::flash('error', 'Please add a shipping address before you can proceed');
            return to_route('users.account.address');
        }
        $userData =   getUserLocationData();
        $currency = CountryCurrency::where('country', $userData['country'])->first();
        if($currency){
            if($currency['country'] == "NG" && Str::contains(strtolower($address->address), 'lagos')){
                $shipping_fee = '8000';
            }else{$shipping_fee = $currency['shipping_fee'];}
         }else {$shipping_fee = '6500';}
        $carts = \Cart::getContent();
        $orderNo = rand(111111111,999999999);
        // $cartSession =  Session::get('cartSession');

        //  $cart = Hashids::connection('products')->decode($cartSession);
        // $check = CartItem::where(['user_id' => auth_user()->id, 'cartSession' => $cart[0]])->first();
     
        // if(!isset($check)){
            event(new CartItemsEvent($carts, $orderNo, $cartSession));
    
         $date['start'] = Carbon::now();
         $date['end'] = Carbon::now()->addDay(1);
         $meta = [
                'url' => url()->current(),
                'title' => 'Checkout | Sanlive Pharmacy',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
         ];
        return view('frontend.checkout', [
            'data' => $date,
            'carts' => $carts,
            'address' => $address,
            'orderNo' => $orderNo,
            'shipping_fee' => $shipping_fee,
            'total' => \Cart::getTotal(),
            'pageMeta' => $meta
        ]);
      }catch(\Exception $e)
      {
         Session::flash('error', $e->getMessage());
         return redirect()->route('users.index');
      }
    }


    public function RegisterUser(Request $request){
         $valid = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:users|min:11',
            'address' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $register = new RegisterUser;
        $reg = $register->UserRegister($request);
        if($reg){
            return redirect()->intended(route('checkout.index'));
        }
       
        Session::flash('alert', 'error');
        Session::flash('msg', 'Something went wrong with your request');
        return back();
    }

       //     $states = ShipmentLocation::where('states', 'LIKE', ucfirst($address->state))->first();
    //         if(isset($states)){
    //     if(ucfirst(strtolower($states->states)) == 'Lagos'){  
    //         $gidi = [
    //             'location_to' => $address->city
    //         ];
    //         $response = $this->checkGidiRates($gidi);
    //         if(isset($response['data']['result'])){
    //         $shipping_fee = $response['data']['result'];
    //         }
    //     }else{
    //         $naijaship = [
    //             "destination" => $states->location,
    //             "weight" => 0.5
    //         ];
    //         $response =  $this->checkNaijaRates($naijaship);  
    //         if(isset($response['data']['fee'])){
    //         $shipping_fee = $response['data']['fee'];
    //         }
    //     }
    //     if($shipping_fee <= 0){
    //         Session::flash('alert', 'Pleae proceed to checkout');
    //         Session::flash('msg', '');
    //     }
        
    // }else{
    //     Session::flash('alert', 'success');
    //     Session::flash('msg', 'Please proceed to checkout');
    // }

}
