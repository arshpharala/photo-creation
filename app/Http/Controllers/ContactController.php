<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\PageDetail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $pageDetail = PageDetail::where(['page_name' => 'contact_us', 'section' => 'metas'])->get();
      
        if ($pageDetail->isNotEmpty()) {
            $data['title'] = $pageDetail->where('sub_section', 'title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section', 'description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section', 'keywords')->first()->heading;
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('contact_us');
        $data['blogs'] = Blog::take(3)->get();
 
        return view('contact',$data);
    }
}
