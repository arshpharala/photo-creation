<?php

namespace App\Http\Controllers;

use App\Models\PageDetail;
use Illuminate\Http\Request;

class ThanksController extends Controller
{
    
    public function index()
    {
       

        $pageDetail = PageDetail::where(['page_name'=>'thanks','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['pageDetail'] = PageDetail::getContent('thanks');
        return view('thanks',$data);
    }
}
