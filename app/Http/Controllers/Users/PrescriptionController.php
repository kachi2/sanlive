<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\Session;

class PrescriptionController extends Controller
{
    //
use imageUpload;
    public function Index()
    {
        return inertia('Users/Pages/prescription', [
            'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Upload Prescription',
            'metaTitle' => websiteName().' Online Health Store, Medicines, Vitamins',
            'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => 'online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => websiteLogo()
            ]
        ]);
    }

    public function PrescriptionStore(Request $request)
    {
    
        $image = $this->UploadImage($request, 'images/prescription');

        $data = [
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'city'=> $request->city,
            'state'=> $request->state,
            'image' =>$image,
            'notes' => $request->notes
        ];

      Prescription::create($data);
        Session::flash('success', 'Prescription Uploaded successfully');
        return back();
    }
}
