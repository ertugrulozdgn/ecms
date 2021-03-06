<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//BACKEND
Route::group(['domain' => 'test_cms.ecms.local'], function () {
    Route::namespace('Cms')->group(function () {
        Route::middleware(['user'])->group(function () {

            //DASHBOARD
            Route::get('/','Admin\DashboardController@index')->name('dashboard.index');

            //POSTS
            Route::resource('news','Post\NewsController');
            Route::get('news/sortable','Post\NewsController@sortable');

            //PAGE
            Route::resource('page','Admin\PageController');
            Route::post('page/sortable','Admin\PageController@sortable');

            //PROFILE
            Route::get('/profile/{id}/edit','Admin\ProfileController@edit');
            Route::post('/profile/{id}','Admin\ProfileController@update');

            //LOGOUT
            Route::get('/logout','Admin\AuthController@logout')->name('admin.Logout');


            Route::middleware(['admin'])->group(function () {

                //USER
                Route::resource('user','Admin\UserController');

                //SETTİNGS
                Route::resource('settings','Admin\SettingController');
            });
        });

        //LOGIN
        Route::get('/login','Admin\AuthController@login')->name('admin.Login');
        Route::post('/login','Admin\AuthController@authenticate')->name('admin.Authenticate');

    });
});

                        //FRONTEND

Route::namespace('Web')->group(function() {

    //HOME
    Route::get('/','HomeController@index')->name('home.index');


    //POSTS
    Route::prefix('post')->group(function () {
        //Posts List
        Route::get('/','Post\NewsController@list')->name('frontend.post.List');
        //Post Detail
        Route::get('/{slug}-{id}','Post\NewsController@show')->where([
            'slug' => '[a-zA-Z-0-9-]+',
            'id' => '[0-9]+'
        ])->name('web.post.Detail');
    });


    //PAGE DETAIL(DROPDOWN MENU)
    Route::get('/page/{slug}','PageController@show')->where([

    ])->name('frontend.page.Detail');

    //CONTACT
    Route::get('/contact','HomeController@contact')->name('frontend.contact.index');
    Route::post('/contact','HomeController@sendMail')->name('frontend.contact.sendMail');

});















    // Slider ve Blog modülünü birleştirmek için bir örnek (ihtiyacım olursa....)

    Route::get('/deneme',function (){

        $bir = \App\Models\Blog::where('status','1')->get()->toArray();

        $iki = \App\Models\Slider::where('status','1')->get()->toArray();

        $uc = array_merge($bir,$iki);

        dd($bir,$iki,$uc);

    });


