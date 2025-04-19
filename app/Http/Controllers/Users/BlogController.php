<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Vinkla\Hashids\Facades\Hashids;

class BlogController extends Controller
{
    public function Index(){
    
        $blogs =  Blog::latest()->paginate(20);
        foreach($blogs as $Blog){
            $Blog->hashid = Hashids::connection('products')->encode($Blog->id);
        }
        return inertia('Users/Pages/blogs', ['blogs' => $blogs,    
            'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Blogs',
            'metaTitle' => $blogs->first()->title,
            'description' => websiteName().' '.$blogs->first()->title,
            'keywords' => $blogs->first()->content,
            'image_url' => websiteLogo()
            ]
        ]);
    }

    public function Details($id){
        $latest =  Blog::latest()->paginate(7);
        foreach($latest as $bb){
            $bb->hashid = Hashids::connection('products')->encode($bb->id);
        }
        $id = Hashids::connection('products')->decode($id);
        $blogs = Blog::findorfail($id[0]);
        return inertia('Users/Pages/blogDetails', [
                'blogs' => $latest,
                'blog' => $blogs,
                'pageMeta' => [
                    'url' => url()->current(),
                    'title' => $blogs->title,
                    'metaTitle' => $blogs->title,
                    'description' => websiteName().' '.$blogs->title,
                    'keywords' => $blogs->content,
                    'image_url' => websiteLogo()
                    ]
            ]);
}

}