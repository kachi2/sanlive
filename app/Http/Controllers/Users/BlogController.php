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

    public function Details($slug)
    {
        try {
            $latest = Blog::latest()->paginate(7);
            $blogs  = Blog::where('slug', $slug)->firstOrFail();
            return view('frontend.blog-details', [
                'blogs'   => $latest,
                'blog'    => $blogs,
                'pageMeta' => [
                    'url'         => url()->current(),
                    'title'       => $blogs->title,
                    'metaTitle'   => $blogs->title,
                    'description' => Str::limit(strip_tags($blogs->content), 155),
                    'keywords'    => '',
                    'image_url'   => $blogs->image ? asset('images/blogs/'.$blogs->image) : websiteLogo(),
                ],
            ]);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function LegacyDetails($id)
    {
        try {
            $decoded = Hashids::connection('products')->decode($id);
            if (!empty($decoded)) {
                $blog = Blog::findOrFail($decoded[0]);
            } else {
                $blog = Blog::findOrFail(decrypt($id));
            }
            return Redirect::to(route('blogs.details', $blog->slug), 301);
        } catch (\Exception $e) {
            abort(404);
        }
    }

}