<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Extension;

class SettingsController extends Controller
{

    public function index()
    {
        $settings = Setting::all();

        return view('cms.admin.setting.index',compact('settings'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $setting = Setting::where('id',$id)->first();

        return view('cms.admin.setting.edit',compact('setting'));
    }


    public function update(Request $request, $id)
    {

        if ($request->hasFile('setting_value'))
        {
            $request->validate([
                'setting_value' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

//            $file_name = uniqid().'.'.$request->setting_value->getClientOriginalExtension();
//            $request->setting_value->storeAs('public/images/settings/',$file_name);
//            $request->setting_value = $file_name;

//            $file_name = uniqid().'.'.$request->setting_value->getClientOriginalExtension();
//            $request->setting_value->move(public_path('images/settings'),$file_name);
//            $request->setting_value = $file_name;
        }


        $setting = Setting::find($id);
        $setting->key = $request->input('setting_key');
        $setting->value = $request->input('setting_value');
        $setting->save();

        if ($setting->save())
        {
            return redirect()->back()->with('success','Düzenleme İşlemi Başarılı!');

        } else {

            return redirect()->back()->with('error','Düzenleme İşlemi Başarısız Oldu!');

        }
    }


    public function destroy($id)
    {
        $setting = Setting::find(intval($id));

        if ($setting->delete())
        {
            return 1;
        }

        return 0;

    }
}
