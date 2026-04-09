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
        // return inertia('Users/Pages/prescription', ['pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.prescription', [
            'pageMeta' => [
                'url'         => url()->current(),
                'title'       => 'Upload Prescription Online – Sanlive Pharmacy Nigeria',
                'metaTitle'   => 'Upload Prescription Online – Sanlive Pharmacy Nigeria',
                'description' => 'Safely upload your doctor\'s prescription and order medicines online at Sanlive Pharmacy. Fast processing and reliable doorstep delivery across Nigeria. PCN licensed.',
                'keywords'    => 'upload prescription online Nigeria, buy prescription medicines, online prescription pharmacy, doctor prescription delivery Nigeria',
                'image_url'   => websiteLogo(),
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
