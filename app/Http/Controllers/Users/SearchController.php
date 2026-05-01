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
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\Graph;

class SearchController extends Controller
{

    public function __invoke(Request $request, $slug=null, $products = [], $id = null)
    {  

try{
        $searchterm = '';
        if(isset($request->q)){
            $products = Product::where('name', 'LIKE', "%$request->q%")->orWhere('description', 'LIKE', "%$request->q%")->get();
            $searchterm = "Showing Results for ".$request->q;
            $keywords[] = $products->pluck('name')->implode(',');
            if (count($products) > 0) {
                $robots = 'index, follow';
            }
            $pageTitle = 'Search Results for "'.e($request->q).'"';
            $pageDesc  = 'Showing results for '.e($request->q).'. Buy medicines, vitamins and supplements with fast doorstep delivery at Sanlive Pharmacy Nigeria.';
            $pageH1    = 'Search Results for "'.e($request->q).'"';
        }elseif($slug){
               $check = Hashids::connection('products')->decode($slug);
          if (!empty($check)) {
                 $categor = Category::where('id', $check[0])->first();
                 if (!$categor) {
                     return inertia('404')->toResponse(request())->setStatusCode(404);
                 }
                return redirect()->to("/catalogs/{$categor->slug}", 301);
            }else{
            $cat = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $cat->id)->get();
            $searchterm = "Showing Results for ".ucfirst(strtolower($cat->name));
            $keywords[] = $products->pluck('name')->implode(',');
            $robots     = 'index, follow';
            $pageTitle  = 'Buy '.ucfirst($cat->name).' Online in Nigeria';
            $pageDesc   = 'Browse and buy '.strtolower($cat->name).' at affordable prices. Fast delivery in Lagos and across Nigeria. PCN licensed online pharmacy.';
            $pageH1     = 'Buy '.ucfirst($cat->name).' Online in Nigeria';
            }
        }else{
            $products   = Product::latest()->take(20)->get();
            $keywords[] = $products->pluck('name')->implode(',');
            $pageTitle  = 'Shop Medicines Online – Vitamins, Supplements & Drugs';
            $pageDesc   = 'Browse and buy quality medicines, anti-malaria, antibiotics, vaccines, skincare, blood tonics and more at affordable prices. Fast delivery in Lagos and across Nigeria. PCN licensed.';
            $pageH1     = 'Shop All Health Products – Sanlive Pharmacy';
        }
        $categories = Category::latest()->get();
        $keywords = implode(',', $keywords);

        $pageMeta = [
            'url'         => url()->current(),
            'title'       => $pageTitle ?? 'Shop Medicines Online | Sanlive Pharmacy',
            'metaTitle'   => $pageTitle ?? 'Shop Medicines Online',
            'description' => $pageDesc  ?? 'Browse and buy quality medicines at affordable prices with fast delivery in Lagos and across Nigeria.',
            'keywords'    => substr($keywords, 0, 160),
            'image_url'   => websiteLogo(),
            'robots'      => $robots ?? 'index, follow',
        ];

        $schema = !isset($request->q)
            ? $this->buildItemListSchema($products, $pageTitle ?? '', $pageDesc ?? '', url()->current())
            : null;

        return view('frontend.products', [
            'products'       => $products,
            'categories'     => $categories,
            'searchterm'     => $searchterm,
            'pageH1'         => $pageH1 ?? 'Shop All Health Products – Sanlive Pharmacy',
            'pageMeta'       => $pageMeta,
            'activeCategory' => $cat->slug ?? null,
            'schema'         => $schema,
        ]);
      }catch(\Exception $e)
      {
         // return inertia('404')->toResponse(request())->setStatusCode(404); // Vue/Inertia preserved
         abort(404);
      }
    }

    private function buildItemListSchema($products, string $name, string $description, string $url): string
    {
        $items = collect($products)->take(20)->values()->map(function ($product, $index) {
            return Schema::listItem()
                ->position($index + 1)
                ->item(
                    Schema::product()
                        ->name($product->name)
                        ->url(url("/products/{$product->slug}"))
                        ->image(url("images/products/{$product->image_path}"))
                );
        })->toArray();

        $graph = new Graph();
        $graph->itemList()
            ->name($name)
            ->description($description)
            ->url($url)
            ->itemListElement($items);

        return $graph->toScript();
    }
}
