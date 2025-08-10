<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserReviewController extends Controller
{
    public function storeReview(Request $request)
    {
        $checkReview = ProductReview::where(['email' => $request->email, 'product_id' =>$request->product_id])->exists();
        if($checkReview){
             Session::flash('error', 'Your have written review on this product already');
             return back();
        }
    try{
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'comment'=> $request->comment,
            'rating' => $request->rating,
            'product_id' => $request->product_id
        ];
        ProductReview::create($data);
        Session::flash('success', 'Review added successfully awaiting admin approval');
        return redirect()->back();
    }catch(\Exception $e)
    {
        Session::flash('error', 'something went wrong! '.$e->getMessage());
        return redirect()->back();
    }
    }
}
