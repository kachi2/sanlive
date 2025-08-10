<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id', 'name', 'title', 'slug', 'cost_price', 'description', 'specification', 'image_path', 'price', 'sale_price', 'discount', 'views', 'order_count', 'sku', 'qty', 'status'
    ];
    protected $with = ['category'];

    protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function boot()
{
    parent::boot();

    static::creating(function ($product) {
        $product->slug = Str::slug($product->name);
    });

    static::updating(function ($product) {
        $product->slug = Str::slug($product->name);
    });
}

public function productReviews()
{
    return $this->hasMany(ProductReview::class, 'product_id','id');
}
}
