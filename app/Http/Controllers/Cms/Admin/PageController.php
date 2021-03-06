<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Data\PostData;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('must')->paginate(10);

        return view('cms.admin.page.index',compact('pages'));
    }


    public function create()
    {
        $situations = Config::get('post.status');

        return view('cms.admin.page.create',compact('situations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'content' => 'required'
        ]);

        $page = new Page;
        $page->user_id = Auth::user()->id;
        $page->title = $request->input('title');
        $page->slug = Str::slug($page->title);
        $page->content = $request->input('content');
        $page->status = $request->input('status');

        $image_path = $page->slug.'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images/pages',$image_path);
        $page->image = $image_path;
        $page->save();



        if ($page->save())
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
        $page = Page::where('id',$id)->first();   // $Page = Page::find($id);  aynı şey

        $situations = Config::get('post.status');

        return view('cms.admin.page.edit',compact('page','situations'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => $request->hasFile('image') ? 'required|image|mimes:jpeg,jpg,png|max:2048' : '',
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($request->hasFile('image'))
        {

            $page = Page::find($id);
            $page->title = $request->input('title');
            $page->slug = Str::slug($page->title);
            $page->content = $request->input('content');
            $page->status = $request->input('status');

//            Storage::delete('public/images/blogs',$blog->image);

            $image_path = public_path('storage/images/pages/').$page->image;
            @unlink($image_path);

            $page_image = $page->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/pages',$page_image);
            $page->image = $page_image;
            $page->save();

        } else {

            $page = Page::find($id);
            $page->title = $request->input('title');
            $page->slug = Str::slug($page->title);
            $page->content = $request->input('content');
            $page->status = $request->input('status');
            $page->save();
        }

        if ($page->save())
        {

            return redirect()->back()->with('success','Güncelleme İşlemi Başarılı');

        } else {

            return redirect()->back()->with('success','Güncelleme İşlemi Başarısız');

        }
    }


    public function destroy($id)
    {
        $page = Page::find(intval($id));

        $image_path = public_path('/storage/images/pages/').$page->image;
        @unlink($image_path);

        if ($page->delete())
        {
            return 1;
        }

        return 0;
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value)
        {
            $pages = Page::find(intval($value));
            $pages->must = intval($key);
            $pages->save();
        }

        echo true;
    }
}
