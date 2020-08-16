<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Blog;
use App\Models\Post;
use App\Models\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Cache::tags('sliders')->remember('sliders', 60, function () {
            return Slider::where('status','1')->orderBy('must')->get();
        });

        $blogs = Cache::tags('blogs')->remember('blogs',60, function () {
            return Blog::with('user')->where('status','1')->orderBy('id','desc')->paginate(21);
        });


        return view('frontend.default.index',compact('sliders','blogs'));
    }


    public function __construct()
    {
        parent::__construct();
    }


    public function contact()
    {
        return view('frontend.default.contact');
    }


    public function sendMail(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'phone' => 'required|digits:11',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];

        Mail::to('ozdgnertugrul@yenihaberler.online')->send(new SendMail($data));

        return back()->with('success','Mail Başarıyla Gönderildi');


    }

}
