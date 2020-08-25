<?php

namespace App\Http\Controllers\Web\Post;

use App\Data\PostData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list()   //Bloglar kısmı
    {
//        $posts = Cache::tags('posts')->remember('posts',60,function () {
//           return Post::orderBy('published_at','desc')->get();
//        });

        $posts = PostData::postList();
        abort_if(empty($posts), 404);

        return view('web.post.news.list',compact('posts'));
    }

    public function show(string $slug, int $id)  //Post detail
    {
        $post = PostData::get($id);
        abort_if(empty($post), 404);


//        $populer_posts = Cache::tags('populer_posts')->remember('populer_posts',60, function () {
//            return Post::orderBy('must')->where('status', 1)->take(5)->get();
//        });


        return view('Web.post.news.show',compact('post'));
    }
}
