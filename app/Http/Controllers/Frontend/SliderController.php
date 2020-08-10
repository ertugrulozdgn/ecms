<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function show(string $slug,int $id)
    {
        $slider = Slider::where('slug',$slug)->where('id',$id)->where('status','1')->first();

        $slider->hit ++;

        $slider->save();

        $populerBlogs = Blog::orderBy('must')->where('status','1')->take(5)->get();

        $postsView = Blog::where('status','1')->orderBy('hit','desc')->take(5)->get();

        return view('frontend.slider.detail',compact('slider','populerBlogs','postsView'));
    }
}
