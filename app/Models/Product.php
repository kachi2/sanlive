<?php

namespace App\Models;

use App\Jobs\GenerateSitemapJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id', 'name', 'title', 'slug', 'cost_price', 'description', 'specification', 'image_path', 'price', 'sale_price', 'discount', 'views', 'order_count', 'sku', 'qty', 'status', 'brand'
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
        $product->slug = static::uniqueSlug(Str::slug($product->name));
    });

    static::updating(function ($product) {
        $product->slug = static::uniqueSlug(Str::slug($product->name), $product->id);
    });

    static::saved(function () {
        GenerateSitemapJob::dispatch();
    });

    static::deleted(function () {
        GenerateSitemapJob::dispatch();
    });
}

public function productReviews()
{
    return $this->hasMany(ProductReview::class, 'product_id','id');
}

private static function uniqueSlug(string $base, ?int $excludeId = null): string
{
    $slug = $base;
    $i = 1;
    while (
        static::where('slug', $slug)
            ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
            ->exists()
    ) {
        $slug = $base . '-' . $i++;
    }
    return $slug;
}
}
