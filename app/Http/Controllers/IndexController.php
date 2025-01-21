<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\PageDetail;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // $pageDetail = PageDetail::where(['page_name' => 'home', 'section' => 'metas'])->get();
        // // dd($pageDetail);
        // if ($pageDetail->isNotEmpty()) {
        //     $data['title'] = $pageDetail->where('sub_section', 'title')->first()->heading;
        //     $data['description'] = $pageDetail->where('sub_section', 'description')->first()->heading;
        //     $data['keyword'] = $pageDetail->where('sub_section', 'keywords')->first()->heading;

        //     // dd($data);
        //     metaData($data);
        // }
        $data['pageDetail'] = PageDetail::getContent('home');
        $data['blogs'] = Blog::take(3)->get();
        // dd($data);
        // dd($data);
        return view('index',$data);
    }
}
