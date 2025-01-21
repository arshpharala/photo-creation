<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\PageDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
  
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageDetail = PageDetail::where(['page_name' => 'home', 'section' => 'metas'])->get();
        dd($pageDetail);
        if ($pageDetail->isNotEmpty()) {
            $data['title'] = $pageDetail->where('sub_section', 'title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section', 'description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section', 'keywords')->first()->heading;
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('home');
        $data['blogs'] = Blog::take(3)->get();
        dd($data);
        // dd($data['blogs']);
        return view('home',$data);
    }
}
