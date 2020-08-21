<?php

// $prefix = config('bp.app.signature') . '-post-hits';
// $ids = Redis::command('zrange', [$prefix, 0, -1]);
// foreach ($ids as $id) {
//     $score = (int)Redis::command('zscore', [$prefix, $id]);
//     DB::table('posts')->where('_id', $id)->increment('hit', $score);
//     Redis::command('zrem', [$prefix, $id]);
//     $this->info($id . ' : ' . $score);
// }

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Data\PostData;

class PostController extends Controller
{
    public function list()   //Bloglar kısmı
    {
//        $posts = Cache::tags('posts')->remember('posts',60,function () {
//           return Post::orderBy('published_at','desc')->get();
//        });

        $posts = PostData::postList();
        abort_if(empty($posts), 404);

        return view('frontend.post.list',compact('posts'));
    }

    public function show(string $slug, int $id)  //Post detail
    {
        $post = PostData::get($id);
        abort_if(empty($post), 404);


//        $populer_posts = Cache::tags('populer_posts')->remember('populer_posts',60, function () {
//            return Post::orderBy('must')->where('status', 1)->take(5)->get();
//        });

        $populer_posts = PostData::populars(); // :: bir sınıfın statik yöntemine erişim sağlar.

        $most_viewed = PostData::mostViewed();

        return view('frontend.post.detail',compact('post','populer_posts','most_viewed'));
    }
}
