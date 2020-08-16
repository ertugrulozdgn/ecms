<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('must')->paginate(10);

        return view('backend.blogs.index',compact('blogs'));
    }


    public function create()
    {
        return view('backend.blogs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'content' => 'required'
        ]);

        $blog = new Blog;
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->input('title');
        $blog->slug = Str::slug($blog->title);
        $blog->content = $request->input('content');
        $blog->status = $request->input('status');

        $blog_image = $blog->slug.'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images/blogs',$blog_image);
        $blog->image = $blog_image;
        $blog->save();


        if ($blog->save())
        {

            return redirect()->back()->with('success','Kaydetme İşlemi Başarılı');

        } else {

            return redirect()->back()->with('success','Kaydetme İşlemi Başarısız');

        }


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();   // $blog = Blog::find($id);  aynı şey

        return view('backend.blogs.edit',compact('blog'));


    }


    public function update(Request $request, $id)
    {

        $request->validate([
           'image' => $request->hasFile('image') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : '',
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($request->hasFile('image'))
        {

            $blog = Blog::find($id);
            $blog->title = $request->input('title');
            $blog->slug = Str::slug($blog->title);
            $blog->content = $request->input('content');
            $blog->status = $request->input('status');

//            Storage::delete('public/images/blogs',$blog->image);

            $image_path = public_path('storage/images/blogs/').$blog->image;
            @unlink($image_path);

            $blog_image = $blog->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/blogs',$blog_image);
            $blog->image = $blog_image;
            $blog->save();


        } else {

            $blog = Blog::find($id);
            $blog->title = $request->input('title');
            $blog->slug = Str::slug($blog->title);
            $blog->content = $request->input('content');
            $blog->status = $request->input('status');
            $blog->save();
        }

        if ($blog->save())
        {

            return redirect()->back()->with('success','Güncelleme İşlemi Başarılı');

        } else {

            return redirect()->back()->with('success','Güncelleme İşlemi Başarısız');

        }
    }


    public function destroy($id)
    {
        $blog = Blog::find($id);

        $image_path = public_path('/storage/images/blogs/').$blog->image;
        @unlink($image_path);

        $blog->delete();

        if ($blog->delete())
        {
            return 1;
        }

        return 0;
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value)
        {
            $blogs = Blog::find(intval($value));
            $blogs->must = intval($key);
            $blogs->save();
        }

        echo true;
    }
}
