<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('must')->paginate(10);

        return view('backend.pages.index',compact('pages'));
    }


    public function create()
    {
        return view('backend.pages.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'content' => 'required'
        ]);

        $page = new Page;
        $page->title = $request->input('title');
        $page->slug = Str::slug($page->title);
        $page->content = $request->input('content');
        $page->status = $request->input('status');

        $page_image = $page->slug.'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images/pages',$page_image);
        $page->image = $page_image;
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

        return view('backend.pages.edit',compact('page'));
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

            $page = Page::find($id);
            $page->title = $request->input('title');
            $page->slug = Str::slug($page->title);
            $page->content = $request->input('content');
            $page->status = $request->input('status');

            Storage::delete('public/images/pages',$page->image);

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
