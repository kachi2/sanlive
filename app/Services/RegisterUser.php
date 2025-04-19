<?php

namespace App\Services;

use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegMail;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class RegisterUser {


    public function viewCheckout(){
     
        $carts = \Cart::getContent();
        if(count($carts) > 0){
        return inertia('Users/Accounts/register', 
        ['carts' => $carts, 'total' => \Cart::getTotal(),
        
        'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Guest registration',
            'metaTitle' => websiteName().':Online Health Store, Medicines, Vitamins.',
            'description' => websiteName().' is a wholesale, retail, and dispensing healthcare platform established for the distribution and retailing of locally manufactured and imported drugs. Easily get affordable medication and prescription drugs delivered to your doorstep',
            'keywords' => 'Buy medical products, order fast, get fast delivery ',
            'image_url' => websiteLogo()
            ]
    ]);
        }else{
            return to_route('users.index');
        }
    }

    public function UserRegister($request){
        $pass = GenerateRef(10);
        $datas = [
            'first_name' => $request->name,
            'last_name' => '',
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => hash::make($pass),
        ];
        User::create($datas);
        $user = User::latest()->first();
        Auth::loginUsingId($user->id);
        sleep(1);
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['country'] = $request->country;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['user_id'] = $user->id;
        $data['is_default'] = 1;
        $data['name'] = $user->first_name.''.$user->last_name;
        $ship = ShippingAddress::create($data);
        $data['password'] =  $pass;
        Mail::to($data['email'])->send(new RegMail($datas));
        return $ship;
    }

}