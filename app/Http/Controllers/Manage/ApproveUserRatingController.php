<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApproveUserRatingController extends Controller
{
    

    public function List()
    {
        $reviews = ProductReview::latest()->paginate(20);
        return view('manage.products.review')
        ->with('reviews', $reviews)
        ->with('bheading', 'Product Reviews')
        ->with('breadcrumb', 'Product Reviews');
    }


    public function approvedRating($review_id)
    {
        $reviews = ProductReview::where('id', $review_id)->first();
        if($reviews)
        {
        $reviews->update(['is_approved' => 1, 'is_verified' => 1]);
        }
        Session::flash('alert', 'success');
        Session::flash('msg', 'Review rating approved successfully');
        return back();
    }


}
