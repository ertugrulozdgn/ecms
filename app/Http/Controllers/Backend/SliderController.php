<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('must')->paginate(10);

        return view('backend.sliders.index',compact('sliders'));
    }


    public function create()
    {
        return view('backend.sliders.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'content' => 'required',
            'url' => 'url|nullable|active_url'
        ]);

        $slider = new Slider;
        $slider->title = $request->input('title');
        $slider->slug = Str::slug($slider->title);
        $slider->content = $request->input('content');
        $slider->status = $request->input('status');
        $slider->url = $request->input('url');

        $slider_image = $slider->slug.'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images/sliders',$slider_image);
        $slider->image = $slider_image;
        $slider->save();



        if ($slider->save())
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
        $slider = Slider::where('id',$id)->first();   // $slider = Slider::find($id);  aynı şey

        return view('backend.sliders.edit',compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => $request->hasFile('image') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : '',
            'title' => 'required',
            'content' => 'required',
            'url' => 'url|nullable|active_url'
        ]);

        if ($request->hasFile('image'))
        {

            $slider = Slider::find($id);
            $slider->title = $request->input('title');
            $slider->slug = Str::slug($slider->title);
            $slider->content = $request->input('content');
            $slider->status = $request->input('status');
            $slider->url = $request->input('url');

            Storage::delete('public/images/sliders',$slider->image);

            $slider_image = $slider->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/sliders',$slider_image);
            $slider->image = $slider_image;
            $slider->save();


        } else {

            $slider = Slider::find($id);
            $slider->title = $request->input('title');
            $slider->slug = Str::slug($slider->title);
            $slider->content = $request->input('content');
            $slider->status = $request->input('status');
            $slider->url = $request->input('url');
            $slider->save();
        }

        if ($slider->save())
        {

            return redirect()->back()->with('success','Güncelleme İşlemi Başarılı');

        } else {

            return redirect()->back()->with('success','Güncelleme İşlemi Başarısız');

        }
    }


    public function destroy($id)
    {
        $slider = Slider::find(intval($id));

        if ($slider->delete())
        {
            return 1;
        }

        return 0;
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $sliders = Slider::find(intval($value));
            $sliders->must = intval($key);
            $sliders->save();
        }

        echo true;
    }
}
