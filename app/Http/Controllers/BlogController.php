<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\PageDetail;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{


    private $Image_prefix;
    public function __construct()
    {
        $this->Image_prefix = "articleImage";
        // $this->middleware('access:role,insert')->only('insertRole');
    }
    public function index(Request $request)
    {

    
         $blog = Blog::where('reference',$request->reference)->first();
         if(empty($blog))
         {
             abort(404);
         }

         $data['blog'] = $blog;
    
        $data['pageDetail'] = PageDetail::getContent('blog');
        $data['blogs'] = Blog::take(3)->get();
        $data['recentBlogs'] = Blog::take(2)->latest()->get();
        // dd($data);
        return view('blog', $data);
    }
    public function create()
    {

        $data['article'] = new Blog();
        $data['submitRoute'] = "insertBlog";
        $data['articleRoute'] = "newsList";

        return view('cms.article.articleForm', $data);
    }

    public function insert(BlogRequest $request)
    {

        $article = new Blog();
        $article->title                = $request->title;
        $article->content              = $request->content;
        $article->post_date            = $request->post_date;
        $article->type                 = 'blog';
        $article->author               = $request->author;
        $article->meta_title           = $request->meta_title;
        $article->meta_description     = $request->meta_description;
        $article->meta_keywords        = $request->meta_keywords;
        $article->summary              = $request->summary;
        $article->reference            = encodeUrlSlug($request->reference);

        if ($request->hasFile('image')) {
            $imageName = $this->Image_prefix . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
            if ($article->type == 'blog') {
                $imageName = 'blogthumbnail' . $imageName;
            } else {
                $imageName = 'newsthumbnail' . $imageName;
            }
            $request->file('image')->move(public_path($article->image_path), $imageName);
            $article->image = $imageName;
        }

        $article->save();
        return redirect()->route('blogList')->with('success', 'Blog Inserted Successfully!');
    }

    public function edit($blog)
    {
        $article    =   Blog::find($blog);

        $data['article']        =   $article;

        $data['articleRoute']   =   "blogList";



        $data['submitRoute']    =   array('updateBlog', $article->id);
        $data['route']          =   $article->type . "List";
        $data['value']          =   $article->type;

        return view("cms.article.articleForm", $data);
    }

    public function update(Blog $blog, BlogRequest $request)
    {
        // $this->authorize('update',$article);
        $blog->title                 = $request->title;
        $blog->content               = $request->content;
        $blog->post_date             = $request->post_date;
        $blog->type                  = 'blog';
        $blog->author                = $request->author;
        $blog->meta_title            = $request->meta_title;
        $blog->meta_description      = $request->meta_description;
        $blog->meta_keywords         = $request->meta_keywords;
        $blog->summary               = $request->summary;
        $blog->reference             = encodeUrlSlug($request->reference);

        if ($request->hasFile('image')) {
            $imageName = $this->Image_prefix . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();

            $imageName = 'blogthumbnail' . $imageName;

            $request->file('image')->move(public_path($blog->image_path), $imageName);
            $blog->image = $imageName;
        }
        if ($request['removeimagetxt'] != null) {
            $blog->image = null;
        }

        $blog->save();
        return redirect()->route('blogList')->with('success', 'Blog Updated Successfully!');
    }

    public function delete(Blog $blog)
    {
        $this->authorize('delete', $blog);
        $blog->delete();
    }

    public function list(Request $request)
    {

        $data['data'] = Blog::get();
        $data['submitRoute'] = 'blogList';
        return view('cms.article.article', $data);
    }
}
