<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {

        $post_headlines = Cache::tags('post_headlines')->remember('post_headlines',60,function () {
            return Post::with('user')->where('location',2)->where('status',1)->orderBy('published_at','desc')->take(3)->get();
        });

        $used_ids = $post_headlines->pluck('id')->toArray();

        $posts = Cache::tags('posts')->remember('posts',60,function () use ($used_ids){
            return Post::whereNotIn('id',$used_ids)->where('status',1)->orderBy('published_at','desc')->paginate(18);
        });


        return view('frontend.default.index',compact('post_headlines','posts'));
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
