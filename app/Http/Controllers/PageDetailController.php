<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\PageDetail;
use Illuminate\Http\Request;
use App\Http\Requests\PageDetailRequest;
use Illuminate\Support\Facades\Validator;

class PageDetailController extends Controller
{
    public function __construct()
    {
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    public function list()
    {
       
        $data['pageDetails']=PageDetail::all();
        return view('cms.pageDetail.pageDetails',$data);
    }

    public function create()
    {
        // $this->authorize('create', new Pagedetail());
        $data['pageDetail'] = new PageDetail();
        $data['summernote']=json_encode(null);
        $data['pages'] = PageDetail::pluck('page_name','id')->unique()->toArray();
        $data['submitRoute'] = "insertPageDetail";
        return view('cms.pageDetail.pageDetailForm',$data);
    }

    public function insert(PageDetailRequest $request)
    {
     
        $inputs = $request->except(["_token",'image', 'icon']);
        $pageDetail = pageDetail::firstOrNew(
            [
                "page_name"     => $inputs['page_name'],
                "section"       => $inputs['section'],
                "sub_section"   => $inputs['sub_section']


            ],
            $inputs
        );
     
        $image_prefix = $inputs['page_name'].'_image_';
        $icon_prefix = $inputs['page_name'].'_icon_';

        if(empty($pageDetail->created_at))
        {
            /* save image file */
            if($request->hasFile('image')){
                $imageName = $image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($pageDetail->image_path), $imageName);
                $pageDetail->image = $imageName;
            }

             /* save image file */
             if($request->hasFile('icon')){
                $imageName = $icon_prefix.Carbon::now()->timestamp.'.'.$request->file('icon')->getClientOriginalExtension();
                $request->file('icon')->move(public_path($pageDetail->image_path), $imageName);
                $pageDetail->icon = $imageName;
            }

            $pageDetail->save();
            \Session::flash('success', 'Page Content Saved!'); 
        }
        else{
            \Session::flash('failure','Duplicate data found!');
        }
        
        return back();
        // return redirect()->route('pageDetailList');
    }

    public function edit(PageDetail $pageDetail)
    {
        // $this->authorize('update', $pageDetail);
        $data['pageDetail'] = $pageDetail;
        $data['summernote']=json_encode(null);
        if($pageDetail->content!=null){
            if (strpos($pageDetail->content, '<p>') || strpos($pageDetail->content, '<p') !== false) {
                $data['summernote']=json_encode(true);
            }
            else{
                $data['summernote']=json_encode(false);
            }
        }
        $data['submitRoute'] = array('updatePageDetail',$pageDetail->id);
        return view("cms.pageDetail.pageDetailForm",$data);
    }

    public function update(PageDetail $pageDetail,PageDetailRequest $request)
    {
        // $this->authorize('update', $pageDetail);
        $inputs = $request->except(["_token",'image']);
        $image_prefix = $inputs['page_name'].'_image_';
        $icon_prefix = $inputs['page_name'].'_icon_';
         $img_alt  = $request->img_alt;
        if($request->hasFile('image')){
            $imageName = $image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $action = $request->file('image')->move(public_path($pageDetail->image_path), $imageName);
            $inputs["image"] = $imageName;
        }
        if($inputs['removeimagetxt']!=null)
        {
            $inputs["image"] = null;
        }
        if($request->hasFile('icon')){
            $imageName = $icon_prefix.Carbon::now()->timestamp.'.'.$request->file('icon')->getClientOriginalExtension();
            $action = $request->file('icon')->move(public_path($pageDetail->image_path), $imageName);
            $inputs["icon"] = $imageName;
        }
        if($inputs['removeicontxt']!=null)
        {
            $inputs["icon"] = null;
        }

        try
        {
            $updated = $pageDetail->update($inputs);
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            if(ends_with($ex->errorInfo[2],"for key 'content_set'"))
            {
                $validator = Validator::make([],[]);
                $validator->errors()->add("section",'duplicate entry for similar section');
                throw new \Illuminate\Validation\ValidationException($validator);
            }
            else
            {
                // dd($ex);
            }
        }
        if(!empty($updated))
        {
            Session::flash('success', 'Page Content updated!'); 
        }
        else
        {
            \Session::flash('failure', 'Error'); 
        }

        return redirect()->route('pageDetailList');
    }

    public function delete(PageDetail $pageDetail)
    {
      
        $pageDetail->delete();
    }
}
