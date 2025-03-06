<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_no', 'cart_items_id', 'shipping_method','channel', 'user_id', 'payable', 'payment_ref', 'payment_method', 'address_id', 'is_paid', 'is_delivered', 'dispatch_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
