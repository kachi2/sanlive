<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Redirect;
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
        try{
        $latest =  Blog::latest()->paginate(7);
        foreach($latest as $bb){
            $bb->hashid = Hashids::connection('products')->encode($bb->id);
        }
        $id = Hashids::connection('products')->decode($id);
        if(!empty($id)){
        $blogs = Blog::findorfail($id[0]);
        }else{
             $blogs = Blog::findorfail(decrypt($id));
             $blogs->hashid = Hashids::connection('products')->encode($blogs->id);
              return Redirect::to("/blogs/details/{$blogs->hashid}", 301);
        }
      
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
          }catch(\Exception $e)
      {
         return inertia('404')->toResponse(request())->setStatusCode(404);
      }
}

}