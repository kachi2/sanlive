<?php

namespace App\Http\Controllers\Users;

use App\Events\CartItemsEvent;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\ShipmentLocation;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Services\RegisterUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegMail;
use App\Models\CountryCurrency;
use App\Traits\CalculateShipping;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    use CalculateShipping;

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function Index($cartSession = null){

        Session::put('cartSession', $cartSession);
    if(!auth::check()){
            $check = new RegisterUser;
           return  $check->viewCheckout();
        }
        if(count(\Cart::getContent()) <= 0 || empty(\Cart::getContent())){
            return to_route('users.index');
        }
        $userData =   getUserLocationData();
        $currency = CountryCurrency::where('country', $userData['country'])->first();
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        if($currency){
            if($currency['country'] == "NG" && Str::contains(strtolower($address->address), 'lagos')){
                $shipping_fee = '8000';
            }else{$shipping_fee = $currency['shipping_fee'];}
         }else {$shipping_fee = '6500';}
        $carts = \Cart::getContent();
        $orderNo = rand(111111111,999999999);
  
        if(!isset($address)){
            Session::flash('error', 'Please add a shipping address before you can proceed');
            return to_route('users.account.address');
        }
        $cartSession =  Session::get('cartSession');
        $cart = Hashids::connection('products')->decode($cartSession);
        $check = CartItem::where(['user_id' => auth_user()->id, 'cartSession' => $cart[0]])->first();
        if(!isset($check) || empty($check)){
            event(new CartItemsEvent($carts, $orderNo, $cartSession));
        }
         $date['start'] = Carbon::now();
         $date['end'] = Carbon::now()->addDay(1);

        return inertia('Users/Carts/Checkout', 
        [
            'data' => $date,
            'carts' => $carts,
            'address' => $address,
            'orderNo' => $orderNo,
            'shipping_fee' => $shipping_fee,
            'total' => \Cart::getTotal()
        ]);
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
