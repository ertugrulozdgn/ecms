<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Cache::tags('sliders')->remember('sliders', 60, function () {
            return Slider::where('status','1')->orderBy('must')->get();
        });
        //
        //    if (Cache::has('sliders'))
        //    {
        //        $sliders = Cache::get('sliders');
//
        //    } else {
        //        $sliders = Slider::where('status','1')->orderBy('must')->get();
        //        Cache::put('sliders',$sliders,60);
        //    }


            if (Cache::has('blogs'))
            {
                $blogs = Cache::get('blogs');

            } else {
                $blogs = Blog::where('status','1')->orderBy('id','desc')->paginate(21);
                Cache::put('blogs',$blogs,60);
            }

        //---------------------------------------------------------

//        $sliders = Cache::get('sliders', function () {
//            return Slider::where('status','1')->orderBy('must')->get();
//        });
//
//        $blogs = Cache::get('blogs',function () {
//           return Blog::where('status','1')->orderBy('id','desc')->paginate(21);
//        });


        return view('frontend.default.index',compact('sliders','blogs'));
    }


    public function __construct()
    {
        parent::__construct();
    }
}
