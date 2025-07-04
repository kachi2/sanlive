<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'markup', 'inflated', 'image_path', 'status', 'slug'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function randomProduct()
    {
        return $this->hasMany(Product::class)->take(5);
    }
}
