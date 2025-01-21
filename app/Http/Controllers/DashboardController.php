<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    
    public function index()
    {
        return view('cms.dashboard');
    }
    public function  ImageUpload(Request $request)
    {

         // ini_set('upload_max_filesize', '-1');
         $imageName = "UploadedImage".Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
         $request->file('image')->move(public_path('uploads/editor/'),$imageName);
         return '/uploads/editor/'.$imageName;
    }
}
