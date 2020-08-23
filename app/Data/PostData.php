<?php

namespace App\Data;

use App\Models\Page;
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

    public static function populars(int $count = 5): Collection // get yaptıgım tüm sorgular collection döner.
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

    public static function postList(): Collection
    {
        return Cache::tags('posts')->remember('posts', 60, function () {
           return Post::orderBy('published_at', 'desc')->get();
        });
    }

    public static function locationHeadlines(): Collection
    {
        return Cache::tags('posts')->remember('location_headline', 60, function () {
           return Post::with('user')->where('location', 2 )->where('status', 1)->orderBy('published_at', 'desc')->take(3)->get();
        });
    }

    public static function locationNormal($used_ids)
    {
        return Cache::tags('posts')->remember('location_normal', 60, function () use ($used_ids) {
           return Post::with('user')->whereNotIn('id',$used_ids)->where('status',1)->orderBy('published_at','desc')->paginate(18);
        });
    }

    public static function pageGet(string $slug): ?Page
    {
        return Cache::tags('pages')->remember('page_slug_' . $slug, 60, function () use ($slug) {
           return Page::where('slug',$slug)->where('status','1')->first();
        });
    }

    public static function usedIds($post_headlines)
    {
        return  $post_headlines->pluck('id')->toArray();
    }
}
