<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Mail\EnquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EnquiryRequest;

class EnquiryController extends Controller
{
    public function enquiryList(Request $request)
    {
       
    
        $query                  =   Enquiry::query();
        $result = $query->orderByDesc('created_at')->paginate(10);
        $request->flash();
        $data['enquiries']  = $result;
        return view('cms.enquiry.enquiry',$data);
    }
    public function enquiryDetail($id)
    {
      
        $enquiry    = Enquiry::find($id);
        $data['enquiry'] = $enquiry;
        return view('cms.enquiry.enquirydetail',$data);
    }
    public function validateEnquiry(EnquiryRequest $request)
    {

        return "done";
    }
    
    public  function insertEnquiry(Request $request)
    { 
       
        $enquiry        = new Enquiry();
        $input          = $request->all();        
   
  
        $enquiry->name                  =   empty($input['user_name']) ? '' : $input['user_name'];
        $enquiry->email                 =   empty($input['email']) ? '' : $input['email'];
        $enquiry->phone                 =   empty($input['phone']) ? '' : $input['phone'];
        $enquiry->message               =   empty($input['message']) ? '' : $input['message'];
        $enquiry->address               =   empty($input['address']) ? '' : $input['address'];
     
        $enquiry->save();
 
        $data['enquiry'] = $enquiry;

        Mail::to($enquiry['email'])->send(new EnquiryMail($data['enquiry']));

        if($request->ajax())
        {
            return "done";
        }
       
        return redirect()->back();
    }

}
