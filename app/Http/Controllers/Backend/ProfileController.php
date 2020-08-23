<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit($id) {

        $user = User::where('id',auth()->user()->id)->first();
        return view('cms.admin.profile.edit',compact('user'));
    }


    public function update(Request $request) {
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'image' => $request->hasFile('image') ? 'required|image|mimes:jpg,jpeg,png|Max:2048' : '',
           'password' => !empty($request->password) ? 'required|Min:8|Max:20|confirmed' : ''
        ]);

        if ($request->hasFile('image'))
        {
            $user_image = uniqid(). '.' .$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/users',$user_image);

            if (!empty($request->password))
            {
                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->image = $user_image;
                $user->save();

            } else {

                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->image = $user_image;
                $user->save();

            }

        } else {

            if (!empty($request->password))
            {
                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->save();

            } else {

                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();

            }

        }

        if ($user->save())
        {
            return back()->with('success','Düzenleme İşlemi Başarılı.');

        } else {

            return back()->with('success','Düzenleme İşlemi Başarısız.');
        }
    }
}
