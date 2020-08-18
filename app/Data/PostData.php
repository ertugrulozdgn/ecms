<?php

namespace App\Data;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class PostData
{
    public static function get(int $id): ?Post // Post || null
    {
        return Cache::tags('posts')->remember('post_id_' . $id, 60, function () use ($id) {
            return Post::with('user')->where('id', $id)->where('status', 1)->first();
        });
    }

    public static function populars(int $count = 5): Collection // Collection
    {
        return Cache::tags('posts')->remember('popular_posts_count_' . $count, 60, function () use ($count) {
            return Post::orderBy('must')->where('status', 1)->take($count)->get();
        });
    }

    public static function mostViewed(int $count = 5): Collection
    {
        return Cache::tags('posts')->remember('most_viewed_count_' . $count, 60, function () use ($count) {
            return Post::where('status', 1)->orderBy('hit', 'desc')->take($count)->get();
        });
    }
}