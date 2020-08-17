<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function list()   //Bloglar kısmı
    {
        $posts = Cache::tags('posts')->remember('posts',60,function () {
           return Post::orderBy('published_at','desc')->get();
        });

        return view('frontend.post.list',compact('posts'));
    }

    public function show($slug,$id)  //Post detail
    {
        $post = Cache::tags('post')->remember('post',60,function () use ($slug,$id) {

            $a = Post::with('user')->where('slug',$slug)->where('id',$id)->where('status',1)->first();

            $a->hit ++;

            $a->save();

           return $a;
        });

//        $post->hit ++;
//
//        $post->save();


        $populer_posts = Cache::tags('populer_posts')->remember('populer_posts',60,function () {
           return Post::orderBy('must')->where('status','1')->take(5)->get();
        });

        $post_views = Cache::tags('post_views')->remember('post_views',60,function () {
           return Post::where('status','1')->orderBy('hit','desc')->take(5)->get();
        });

        return view('frontend.post.detail',compact('post','populer_posts','post_views'));
    }
}
