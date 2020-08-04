<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index() {

       $sliders = Slider::where('status',1)->orderBy('must')->get();


        return view('frontend.default.index',compact('sliders'));
    }
}
