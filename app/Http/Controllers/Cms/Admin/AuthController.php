<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {

        return view('auth.login');

    }


    public function authenticate(Request $request) {

        $request->flash();

        $credentials = $request->only('email','password');
        $remember_token = $request->has('remember_token') ? true : false;  //dd() ile kontrol ettiğimizde remembere_token sonucu "on" dönüyor. Bu yüzden bir if koşulu yaptık.

        if (Auth::attempt($credentials,$remember_token))
        {
            return redirect()->intended(action('Backend\DefaultController@index'));

        } else {
            return back()->with('error','Email veya Şifre Hatalı!');
        }

    }


    public function logout() {

        Auth::logout();
        return redirect(action('Backend\DefaultController@login'))->with('success','Çıkış İşlemi Başarıyla Yapıldı.');
    }
}
