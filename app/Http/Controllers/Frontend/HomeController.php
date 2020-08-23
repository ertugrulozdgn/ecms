<?php

namespace App\Http\Controllers\Frontend;

use App\Data\PostData;
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

        $post_headlines = PostData::locationHeadlines();

        $used_ids = PostData::usedIds($post_headlines);

        $posts = PostData::locationNormal($used_ids);


        return view('web.home.index',compact('post_headlines','posts'));
    }

//
//    public function __construct()
//    {
//        parent::__construct();
//    }


    public function contact()
    {
        return view('web.default.contact');
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
