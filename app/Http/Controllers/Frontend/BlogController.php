<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index() {


        $blogs = Blog::where('status','1')->orderBy('id','desc')->get();


        return view('frontend.blog.index',compact('blogs'));

    }


    public function show(string $slug, int $id) {

        $blog = Blog::where('slug',$slug)->where('id',$id)->where('status','1')->first();

        $blog->hit ++;

        $blog->save();

        $populerBlogs = Blog::orderBy('must')->where('status','1')->take(5)->get();

        $postsView = Blog::where('status','1')->orderBy('hit','desc')->take(5)->get();

        return view('frontend.blog.detail',compact('blog','populerBlogs','postsView'));

    }
}
