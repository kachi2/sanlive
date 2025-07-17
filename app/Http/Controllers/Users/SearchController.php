<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Facade\FlareClient\View;
use stdClass;
use Vinkla\Hashids\Facades\Hashids;

class SearchController extends Controller
{

    public function __invoke(Request $request, $slug=null, $products = [], $id = null)
    {  

try{
        $searchterm = '';
        if(isset($request->q)){
            $products = Product::where('name', 'LIKE', "%$request->q%")->orWhere('description', 'LIKE', "%$request->q%")->get();
            $searchterm = "Showing Results for ".$request->q;
            $keywords[] =  $products->pluck('name')->implode(',');
            if(isset($products) && count($products) > 0)
            {$robots = 'index, follow';
            }else{
             $robots = 'noindex, follow';
            }
        }elseif($slug){
               $check = Hashids::connection('products')->decode($slug);
          if (!empty($check)) {
                 $categor = Category::where('id', $check)->first();
                return redirect()->to("/catalogs/{$categor->slug}", 301);
            }else{
            $cat = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $cat->id)->get();
            $searchterm = "Showing Results for ".ucfirst(strtolower($cat->name));
            $keywords[] =  $products->pluck('name')->implode(',');
            $robots = 'index, follow';
            }
        }else{
            $products = Product::latest()->take(20)->get();
            $keywords[] =  $products->pluck('name')->implode(',');
        }
        $categories = Category::latest()->get();
        $keywords = implode(',', $keywords);

        return inertia('Users/Pages/products', [
            'products' => $products,
            'categories' => $categories,
            'searchterm' => $searchterm,
            'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Search | Search Online Health Store, Medicines, Vitamins',
            'metaTitle' => 'Sanlive Phamarcy  | Online Health Store, Medicines, Vitamins',
            'description' =>  'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices, '.substr($keywords, 0,80),
            'keywords' => substr($keywords,0,100),
            'image_url' => websiteLogo(),
            'robots' => $robots??'', 
        ]
        ]);
      }catch(\Exception $e)
      {
         return inertia('404')->toResponse(request())->setStatusCode(404);
      }
    }
}
