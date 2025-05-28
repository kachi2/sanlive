<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class UpdateProductTest extends Controller
{

    public function index()
    {
        $products = Product::all();

foreach ($products as $product) {
    if (!$product->slug) {
        $baseSlug = Str::slug($product->name);
        $slug = $baseSlug;
        $suffixLength = 5;
        $i = 1;
        while (
            Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()
        ) {
            $slug = $baseSlug . '-' . Str::random($suffixLength);
            $i++;
            if ($i > 10) break; // Avoid infinite loop
        }

        $product->slug = $slug;
        $product->save();
        echo "Slug generated for #{$product->id}: {$product->slug}\n";
    }
}
    }

    public function categorySlug()
    {
           $categories = Category::all();

foreach ($categories as $category) {
    if (!$category->slug) {
        $baseSlug = Str::slug($category->name);
        $slug = $baseSlug;
        $suffixLength = 5;
        $i = 1;
        while (
            Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()
        ) {
            $slug = $baseSlug . '-' . Str::random($suffixLength);
            $i++;
            if ($i > 10) break; // Avoid infinite loop
        }

        $category->slug = $slug;
        $category->save();
        echo "Slug generated for #{$category->id}: {$category->slug}\n";
    }
}
    }
}
