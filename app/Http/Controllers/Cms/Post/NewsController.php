<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Requests\StoreNewsPost;
use App\Http\Requests\UpdateNewsPost;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('must')->get();

        return view('cms.posts.news.index',compact('posts'));
    }


    public function create()
    {
        $edit = 0;

        $categories = Category::orderBy('must')->get();

//        $categories = Category::pluck('title','id');

        $locations =  Config::get('post.location');

        $situations = Config::get('post.status');

        return view('cms.posts.news.edit',compact('categories','locations','situations','edit'));
    }


    public function store(StoreNewsPost $request)
    {

        if (!empty($request->input('seo_title')))
        {
            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->category_id = $request-> input('category_id');
            $post->status = $request->input('status');
            $post->location = $request->input('location');
            $post->title = $request->input('title');
            $post->slug = Str::slug($post->title);
            $post->seo_title = $request->input('seo_title');
            $post->content = $request->input('content');
            $post->published_at = $request->input('published_at');

            $post_image = $post->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/posts',$post_image);
            $post->image = $post_image;

            $post->save();

        } else {

            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->category_id = $request-> input('category_id');
            $post->status = $request->input('status');
            $post->location = $request->input('location');
            $post->title = $request->input('title');
            $post->slug = Str::slug($post->title);
            $post->seo_title = $request->input('title');
            $post->content = $request->input('content');
            $post->published_at = $request->input('published_at');

            $post_image = $post->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/posts',$post_image);
            $post->image = $post_image;

            $post->save();
        }


        if ($request->get('save') == 'save')    // get('name') == value
        {
            return redirect(action('Cms\Post\NewsController@index'))->with('success','Kaydetme İşlemi Başarılı');

        } elseif ($request->get('save') == 'save_and_continue')
        {
            return back()->with('success','Kaydetme İşlemi Başarılı');

        } else {

            return back()->with('error','Kaydetme İşlemi Başarız');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $edit = 1;

        $post = Post::where('id',$id)->first();

        $categories = Category::all();

//        $categories = Category::pluck('title', 'id');

        $locations =  Config::get('post.location');

        $situations = Config::get('post.status');

        return view('cms.posts.news.edit',compact('post','categories','locations','situations', 'edit'));
    }


    public function update(UpdateNewsPost $request, $id)
    {
        $request->validate([
            'location' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => $request->hasFile('image') ? 'required|image|mimes:jpeg,pjg,png|max:2048' : ''
        ]);

        if ($request->hasFile('image'))
        {

            $post = Post::find($id);

            $image_path = public_path('storage/images/posts/').$post->image;
            @unlink($image_path);

            $post_image = $post->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/posts',$post_image);


            if (!empty($request->input('seo_title')))
            {

                $post->user_id = Auth::user()->id;
                $post->category_id = $request->input('category_id');
                $post->status = $request->input('status');
                $post->location = $request->input('location');
                $post->title = $request->input('title');
                $post->slug = Str::slug($request->input('title'));
                $post->seo_title = $request->input('seo_title');
                $post->content = $request->input('content');

                $post->image = $post_image;
                $post->save();

            } else {

                $post->user_id = Auth::user()->id;
                $post->category_id = $request->input('category_id');
                $post->status = $request->input('status');
                $post->location = $request->input('location');
                $post->title = $request->input('title');
                $post->slug = Str::slug($request->input('title'));
                $post->seo_title = $request->input('title');
                $post->content = $request->input('content');

                $image_path = public_path('storage/images/posts/').$post->image;
                @unlink($image_path);

                $post->image = $post_image;
                $post->save();

            }

        } else {

            if (!empty($request->input('seo_title')))
            {

                $post = Post::find($id);
                $post->user_id = Auth::user()->id;
                $post->category_id = $request->input('category_id');
                $post->status = $request->input('status');
                $post->location = $request->input('location');
                $post->title = $request->input('title');
                $post->slug = Str::slug($request->input('title'));
                $post->seo_title = $request->input('seo_title');
                $post->content = $request->input('content');
                $post->save();

            } else {

                $post = Post::find($id);
                $post->user_id = Auth::user()->id;
                $post->category_id = $request->input('category_id');
                $post->status = $request->input('status');
                $post->location = $request->input('location');
                $post->title = $request->input('title');
                $post->slug = Str::slug($request->input('title'));
                $post->seo_title = $request->input('title');
                $post->content = $request->input('content');
                $post->save();

            }
        }

        if ($request->get('save') == 'save')    // get('name') == value
        {
            return redirect(action('Cms\Post\NewsController@index'))->with('success','Kaydetme İşlemi Başarılı');

        } elseif ($request->get('save') == 'save_and_continue')
        {
            return back()->with('success','Kaydetme İşlemi Başarılı');

        } else {

            return back()->with('error','Kaydetme İşlemi Başarız');
        }
    }


    public function destroy($id)
    {

        $post = Post::find($id);

        $image_path = public_path('storage/images/posts/').$post->image;
        @unlink($image_path);

        $post->delete();

        if ($post->delete())
        {
            return 1;
        }

        return 0;
    }


    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value)
        {
            $posts = Post::find(intval($value));
            $posts->must = intval($key);
            $posts->save();
        }

        echo true;
    }
}
