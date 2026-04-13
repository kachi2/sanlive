<?php

namespace App\Models;

use App\Jobs\GenerateSitemapJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'markup', 'inflated', 'image_path', 'status', 'slug'];

    protected static function booted(): void
    {
        static::saved(function () {
            GenerateSitemapJob::dispatch();
        });

        static::deleted(function () {
            GenerateSitemapJob::dispatch();
        });
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function randomProduct()
    {
        return $this->hasMany(Product::class)->take(5);
    }
}
