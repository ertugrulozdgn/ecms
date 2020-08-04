<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('backend.users.index',compact('users'));
    }


    public function create()
    {
        return view('backend.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|Min:8|Max:20|confirmed'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->status = $request->input('status');

        $user_image = uniqid(). '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images/users',$user_image);
        $user->image = $user_image;
        $user->save();

        if ($user->save())
        {
            return redirect()->route('user.index')->with('success','Kaydetme İşlemi Başarılı');
        }
        else {
            return redirect()->back()->with('error','Kaydetme İşlemi Başarısız');
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::where('id',$id)->first();

        return view('backend.users.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required',
           'image' => $request->hasFile('image') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : '',
           'email' => 'required|email',
           'password' => !empty($request->password) ? 'required|Min:8|Max:20|Confirmed' : ''
        ]);

        if ($request->hasFile('image'))
        {
            $user = User::find($id);
            Storage::delete('public/images/users',$user->image);
            $user_image = uniqid(). '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images/users',$user_image);

            if (!empty($request->password)) {

            $user->role = $request->input('role');
            $user->status = $request->input('status');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->image = $user_image;
            $user->save();

            } else {

            $user->role = $request->input('role');
            $user->status = $request->input('status');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->image = $user_image;
            $user->save();

            }

        } else {

            if (!empty($request->password)) {

                $user = User::find($id);
                $user->role = $request->input('role');
                $user->status = $request->input('status');
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->save();

            } else {

                $user = User::find($id);
                $user->role = $request->input('role');
                $user->status = $request->input('status');
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();

            }
        }

        if($user->save())
        {
            return redirect()->back()->with('success','Düzenleme işlemi başarılı');

        } else {

            return redirect()->back()->with('error','Düzenleme işlemi başarısız');
        }
    }


    public function destroy($id)
    {
        $user = User::find(intval($id));

        if ($user->delete())
        {
            return 1;
        }

        return 0;

    }
}
