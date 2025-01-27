<?php

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Website;
use App\Models\PageDetail;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if (! function_exists('public_path')) {
    /**
     * Get the path to the public directory.
     *
     * @param  string  $path
     * @return string
     */
    function public_path($path = '')
    {
        return base_path('public_html') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}


if(!function_exists('summernote_replace')){
    function summernote_replace($content){
        foreach($content as $key=>$value)
        {
            $content->$key = str_replace('<p></p>',null,$value);
            $content->$key = str_replace('<p><br></p>',null,$value);
        }
        return $content;
    }
}
if (!function_exists('encodeUrlSlug')) {
    function encodeUrlSlug($string)
    {
        $name = str_replace("&", " and", "$string");
        $name = str_replace("+", " plus", "$name");
        $name = str_replace("/", "", "$name");
        $name = str_replace("-", " ", "$name");
        $stringname = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $name));
        return $stringname;
    }
}
    if (!function_exists('metaData')) {

        function metaData($str)
        {



               $url = request()->url();

               if(Str::contains($url,'home'))
               {

                    $page_name =  'home';
               }
                elseif(Str::contains($url,'about'))
               {
                      $page_name = 'about';

               }
               elseif(Str::contains($url,'contact'))
               {
                    $page_name = 'contact';
               }
               elseif(Str::contains($url,'banner'))
               {
                         $page_name = 'banner';
               }
               elseif(Str::contains($url,'blog'))
               {
                         $page_name = 'blog';
               }
               else{
                  $page_name='home';
               }



             $pageDetail =   PageDetail::where(['page_name' => $page_name, 'section' => 'metas'])->get();
             $data=$pageDetail->where('sub_section', 'title')->first()->heading;

             return $data;

        }
    }

    if (!function_exists('bannerDetails')) {



        function bannerDetails()
        {

             $banners=Banner::take('4')->get();
            return $banners;
        }
    }


    if (!function_exists('websiteDetail')) {



        function websiteDetail()
        {

             $website=Website::first();
            return $website;
        }
    }
