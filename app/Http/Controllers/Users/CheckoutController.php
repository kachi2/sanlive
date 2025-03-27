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
 
    //

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function Index($cartSession = null){
    if(!auth::check()){
            $check = new RegisterUser;
           return  $check->viewCheckout();
        }
        if(count(\Cart::content()) <= 0 || empty(\Cart::content())){
            return to_route('users.index');
        }
        $userData =   getUserLocationData();
        $currency = CountryCurrency::where('country', $userData['country'])->first();
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' =>1])->first();
        if($currency){
            if($currency['country'] == "NG" && Str::contains(strtolower($address->address), 'lagos')){
                $shipping_fee = '8000';
            }else{
                $shipping_fee = $currency['shipping_fee']; 
          }
        }else {
            $shipping_fee = '6500';
          }
        $carts = \Cart::content();
        $orderNo = rand(111111111,999999999);
  
        if(!isset($address)){
            Session::flash('alert', 'error');
            Session::flash('msg', 'Please add a shipping address before you can proceed');
            return redirect()->intended(route('users.account.address'));
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

        $cart = Hashids::connection('products')->decode($cartSession);
        $check = CartItem::where(['user_id' => auth_user()->id, 'cartSession' => $cart])->first();
        if(!isset($check) || empty($check)){
            event(new CartItemsEvent($carts, $orderNo, $cartSession));
        }
         $date['start'] = Carbon::now();
         $date['end'] = Carbon::now()->addDay(1);

        return view('users.carts.checkout', $date)
        ->with('carts', $carts)
        ->with('address', $address)
        ->with('orderNo', $orderNo)
        ->with('shipping_fee',  $shipping_fee);
    }

    public function RegisterUser(Request $request){
         $valid = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('alert', 'error');
            Session::flash('message', $valid->errors()->first());
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }
        $userck = User::where('email', $request->email)->first();
        if($userck){
            Session::flash('alert', 'error');
            Session::flash('msg', 'This email address is already taken');
            return back()->withInput($request->all());
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

}
