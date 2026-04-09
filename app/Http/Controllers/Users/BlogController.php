<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;

class BlogController extends Controller
{
    public function Index(){
    
        $blogs =  Blog::latest()->paginate(20);
        foreach($blogs as $Blog){
            $Blog->hashid = Hashids::connection('products')->encode($Blog->id);
        }
        // return inertia('Users/Pages/blogs', ['blogs' => $blogs, 'pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.blogs', [
            'blogs' => $blogs,
            'pageMeta' => [
                'url'         => url()->current(),
                'title'       => 'Health Blog – Tips, Articles & Wellness Advice | Sanlive Pharmacy',
                'metaTitle'   => 'Health Blog – Tips, Articles & Wellness Advice',
                'description' => 'Read informative articles on health, medicine usage, wellness tips, disease prevention and more from Sanlive Pharmacy experts. Stay informed about your health.',
                'keywords'    => 'health blog Nigeria, medicine tips, wellness advice, health articles Nigeria, pharmacy blog, disease prevention',
                'image_url'   => websiteLogo(),
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
      
        // return inertia('Users/Pages/blogDetails', ['blogs' => $latest, 'blog' => $blogs, 'pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.blog-details', [
                'blogs' => $latest,
                'blog' => $blogs,
                'pageMeta' => [
                    'url' => url()->current(),
                    'title' => $blogs->title,
                    'metaTitle' => $blogs->title,
                    'description' => Str::limit(strip_tags($blogs->content), 155),
                    'keywords' => '',
                    'image_url' => $blogs->image ? asset('images/blogs/'.$blogs->image) : websiteLogo()
                ]
            ]);
          }catch(\Exception $e)
      {
         // return inertia('404')->toResponse(request())->setStatusCode(404); // Vue/Inertia preserved
         abort(404);
      }
}

}