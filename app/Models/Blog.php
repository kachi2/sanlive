<?php

namespace App\Models;

use App\Jobs\GenerateSitemapJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'views', 'content', 'image', 'slug'];
    protected $table = "blogs";

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = \Illuminate\Support\Str::slug($blog->title);
            }
        });

        static::saved(function () {
            GenerateSitemapJob::dispatch();
        });

        static::deleted(function () {
            GenerateSitemapJob::dispatch();
        });
    }
}
