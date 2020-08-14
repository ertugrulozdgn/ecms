<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    public function index() {

        $blogs = Cache::tags('blogs')->remember('blogs',60,function () {
            return Blog::where('status','1')->orderBy('id','desc')->get();

        });

        return view('frontend.blog.index',compact('blogs'));

    }


    public function show(string $slug, int $id) {

        $blog = Cache::tags('blogs')->remember('tags',60,function () use($slug,$id) {

            $a = Blog::where('slug',$slug)->where('id',$id)->where('status','1')->first();

            $a->hit ++;

            $a->save();

           return $a;


        });


        $populerBlogs = Cache::tags('populerBlogs')->remember('populerBlogs',60,function () {
           return Blog::orderBy('must')->where('status','1')->take(5)->get();
        });

        $postsView = Cache::tags('postView')->remember('postsView',60,function () {
           return Blog::where('status','1')->orderBy('hit','desc')->take(5)->get();
        });

        return view('frontend.blog.detail',compact('blog','populerBlogs','postsView'));

    }
}
