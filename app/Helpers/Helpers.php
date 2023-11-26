<?php

use Vinkla\Hashids\Facades\Hashids;

if(!function_exists('trimInput')){

    function trimInput($input){
        return str_replace(['/', ' ','*', '+', '=', '<', '>', '&', '^', '%', '$', '#', '@', '!', '[', ']', ], '', $input);
    }
}

if(!function_exists('moneyFormat')){
    function moneyFormat($currency){
        return '₦'.number_format($currency, 2);
    }

if(!function_exists('auth_user')){

    function auth_user(){
        return auth()->user();
    }
}

if(!function_exists('addHashId')){
    function addHashId($data){
        foreach($data as $dd){
            $dd->hashid = Hashids::connection('products')->encode($dd->id);
        }
    return $data;
    }
}

if(!function_exists('shippingBase')){
    function shippingBase($param = null){
        return 'https://api.jand2gidi.com.ng/api/v1/'.$param;
    }


if(!function_exists('moneyFormat')){
    function moneyFormat($data){
        return '₦'.number_format($data,2);
    }
}

if(!function_exists('GenerateRef')){

    function GenerateRef($size){
        return substr(str_replace(['[', ']', '+', '=','!','@','#','%','&','*','(',')','/'], '', base64_encode(random_bytes(16))),0, $size);
    }
}

if(!function_exists('checkCart')){
    function checkCart(){
        if(count(\Cart::content()) <= 0){
            return redirect()->intended(route('users.index'));
        }
    }
}

}















}