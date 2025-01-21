<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Requests\WebsiteRequest;

class WebsiteController extends Controller
{
    
    private $Image_prefix;
   

    public function __construct()
    {
        $this->Image_prefix = "websiteImage";
    	
    }

    
    public function list()
    {
       
        $data['websites'] = Website::all();   
        return view('cms.website.list',$data);
    }
    public function create()
    {
      
        $data['website'] = new Website();
         $data['submitRoute'] = "insertWebsite";
       
        return view('cms.website.form',$data);
    }
 

    public function insert(WebsiteRequest $request)
    {
     
        
        $website=new Website();
        // $websitedetail->web_id         = $request->website;
      
        $website->address            = $request->address;
        $website->contact_number     = $request->contact_number;
        $website->name               = $request->name;
        $website->contact_email      = $request->contact_email ;
        $website->contact_footer     = $request->contact_footer ;
        $website->copyright_footer   = $request->copyright_footer;
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($website->image_path), $imageName);

        
            $website->image = $imageName;
        }
        $website->save();
        return redirect()->route('websiteList')->with('success','Successfully Added');

    }
    public function  edit($website)
    {
        $website=Website::where('id',$website)->first();
       
      
        $data['website'] = $website;
        $data['submitRoute'] = array('updateWebsite',$website->id);
        
       
    
      
        return view("cms.website.form",$data);
    }

    public function delete($website)
    {
        
       
        $website=Website::where('id',$website)->first();
        $website->delete();

    }

    
    public function update($website,WebsiteRequest $request)
    {
       
        $website=Website::where('id',$website)->first();
        $website->address            = $request->address;
        $website->contact_number     = $request->contact_number;
        $website->name               = $request->name;
        $website->contact_email      = $request->contact_email ;
        $website->contact_footer     = $request->contact_footer ;
        $website->copyright_footer   = $request->copyright_footer;
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($website->image_path), $imageName);
            $website->image = $imageName;
        }
        if($request['removeimagetxt']!=null)
        {
            $website->image = null;
        }
        $website->save();
        return redirect()->route('websiteList')->with('success','Successfully Updated ');

    }
}
