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

//Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});


                            //BACKEND

Route::namespace('Backend')->group(function () {
        Route::middleware(['user'])->group(function () {
            Route::prefix('admin')->group(function () {

                //DASHBOARD
                Route::get('/','DefaultController@index')->name('admin.index');

                //BLOG
                Route::resource('blog','BlogController');
                Route::post('blog/sortable','BlogController@sortable')->name('blog.Sortable');

                //PAGE
                Route::resource('page','PageController');
                Route::post('page/sortable','PageController@sortable')->name('page.Sortable');

                //SLIDER
                Route::resource('slider','SliderController');
                Route::post('slider/sortable','SliderController@sortable')->name('slider.Sortable');

                //PROFILE
                Route::get('/profile/{id}/edit','ProfileController@edit')->name('profile.Edit');
                Route::post('/profile/{id}','ProfileController@update')->name('profile.Update');

                //LOGOUT
                Route::get('/logout','DefaultController@logout')->name('admin.Logout');

            });

            Route::middleware(['admin'])->group(function () {
                Route::prefix('admin')->group(function() {

                    //USER
                    Route::resource('user','UserController');

                    //SETTİNGS
                    Route::resource('settings','SettingsController');
                });
            });
        });


        Route::prefix('admin')->group(function() {

            //LOGIN
            Route::get('/login','DefaultController@login')->name('admin.Login');
            Route::post('/login','DefaultController@authenticate')->name('admin.Authenticate');

        });

});


                        //FRONTEND

Route::namespace('frontend')->group(function() {

    //HOME
    Route::get('/','DefaultController@index')->name('home.Index');
});




//Route::get('/admin/deneme', function () {
//   dd(Setting::pluck('value','key')->all());
//});

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/home', 'HomeController@index')->name('home');
