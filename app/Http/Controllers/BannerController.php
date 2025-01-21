<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\PageDetail;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    
    private $Image_prefix;
   

    public function __construct()
    {
        $this->Image_prefix = "bannerImage";
    	
    }
    public function index(Request $request)
    {

        $pageDetail = PageDetail::where(['page_name' => 'banner', 'section' => 'metas'])->get();
        // dd($pageDetail);
        if ($pageDetail->isNotEmpty()) {
            $data['title'] = $pageDetail->where('sub_section', 'title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section', 'description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section', 'keywords')->first()->heading;
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('banner');
        // dd($request->all());
        $data['banner']=Banner::where('reference',$request->banner)->first();
        // dd($data);
        return view('banner',$data);
         
    }
    
    public function list()
    {
       
        $data['banners'] = Banner::all();   
        return view('cms.banner.list',$data);
    }
    public function create()
    {
      
        $data['banner'] = new Banner();
         $data['submitRoute'] = "insertBanner";
       
        return view('cms.banner.form',$data);
    }
 

    public function insert(BannerRequest $request)
    {
     
        
        $banner=new Banner();
        // $websitedetail->web_id         = $request->website;
        $banner->heading         = $request->heading;
        $banner->content        = $request->content;
        $banner->reference        = $request->reference;
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($banner->image_path), $imageName);

        
            $banner->image = $imageName;
        }
        $banner->save();
        return redirect()->route('bannerList')->with('success','Successfully Added');

    }
    public function  edit($banner)
    {
        $banner=Banner::where('id',$banner)->first();
       
      
        $data['banner'] = $banner;
        $data['submitRoute'] = array('updateBanner',$banner->id);
        
       
    
      
        return view("cms.banner.form",$data);
    }

    public function delete($banner)
    {
        
       
        $banner=Banner::where('id',$banner)->first();
        $banner->delete();

    }

    
    public function update($banner,BannerRequest $request)
    {
       
        $banner=Banner::where('id',$banner)->first();
    
        $banner->heading         = $request->heading;
        $banner->content        = $request->content;
        $banner->reference        = $request->reference;
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($banner->image_path), $imageName);
            $banner->image = $imageName;
        }
        if($request['removeimagetxt']!=null)
        {
            $banner->image = null;
        }
        $banner->save();
        return redirect()->route('bannerList')->with('success','Successfully Updated ');

    }
}
