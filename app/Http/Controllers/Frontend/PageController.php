<?php

namespace App\Http\Controllers\Frontend;

use App\Data\PostData;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class

PageController extends Controller
{
    public function show($slug)
    {
        $page = PostData::pageGet($slug);
        abort_if(empty($page), 404);

//        $page = Cache::tags('page')->remember('page',60,function () use($slug) {
//            return Page::where('slug',$slug)->where('status','1')->first();
//        });

        return view('web.page.detail',compact('page'));
    }
}
