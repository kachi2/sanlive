<?php

namespace App\Listeners;

use App\Models\CartItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddCartItems
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $events): void
    {
        foreach($events->carts as $cart){
            $data = [
                'user_id' => auth_user()->id,
                'product_id' => $cart->model->id,
                'Order_no' => $events->orderNo,
                'qty' => $cart->qty,
                'payable' => $cart->price * $cart->quantity,
                'status' => 0,
                'cartSession' => $events->cartSession,
                'image' => $cart->model->image_path,
                'product_name' => $cart->model->name,
                'price' => $cart->model->sale_price,
                'product_prescription' => $cart->options->image??null
            ];
            CartItem::create($data);
          }
    }
}
