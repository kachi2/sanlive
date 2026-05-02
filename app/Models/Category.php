<?php

namespace App\Models;

use App\Jobs\GenerateSitemapJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'markup', 'inflated', 'image_path', 'status', 'slug'];

    protected static function booted(): void
    {
        static::creating(function ($category) {
            $category->slug = static::uniqueSlug(Str::slug($category->name));
        });

        static::updating(function ($category) {
            $category->slug = static::uniqueSlug(Str::slug($category->name), $category->id);
        });

        static::saved(function () {
            GenerateSitemapJob::dispatch();
        });

        static::deleted(function () {
            GenerateSitemapJob::dispatch();
        });
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

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function randomProduct()
    {
        return $this->hasMany(Product::class)->take(5);
    }
}
