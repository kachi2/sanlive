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

    public function __invoke(Request $request, $id=null, $products = [], $data = [])
    {  

try{
        $searchterm = '';
        if(isset($id)){
            $id = explode('-',$id);
            $id = array_pop($id);
            $cat = Category::findOrFail(decodeHashid($id));
        }
        if(isset($request->q)){
            $products = Product::where('name', 'LIKE', "%$request->q%")->orWhere('description', 'LIKE', "%$request->q%")->get();
            $searchterm = "Showing Results for ".$request->q;
            addHashId($products);
            $keywords[] =  $products->pluck('name')->implode(',');
        }elseif(isset($id)){
            $products = Product::where('category_id', decodeHashid($id))->get();
            $searchterm = "Showing Results for ".ucfirst(strtolower($cat->name));
            addHashId($products);
            $keywords[] =  $products->pluck('name')->implode(',');
        }else{
            $products = Product::latest()->take(20)->get();
            addHashId($products);
            $keywords[] =  $products->pluck('name')->implode(',');
        }
        $categories = Category::latest()->get();
        foreach($categories as $cats){
            addHashId($cats->products);
            addHashId($categories);
        }
        $keywords = implode(',', $keywords);

        addHashId($categories);
        return inertia('Users/Pages/products', [
            'products' => $products,
            'categories' => $categories,
            'searchterm' => $searchterm,
            'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Product | Online Health Store, Medicines, Vitamins',
            'metaTitle' => 'Product | Online Health Store, Medicines, Vitamins',
            'description' =>  'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices, 
                '.substr($keywords, 0,80),
            'keywords' => substr($keywords,0,100),
            'image_url' => websiteLogo()
        ]

        ]);
      }catch(\Exception $e)
      {
          return inertia('404');
      }
    }
}
