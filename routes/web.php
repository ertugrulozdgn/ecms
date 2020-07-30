<?php

use App\Models\Setting;
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

Route::get('/', function () {
    return view('welcome');
});


                            //BACKEND

Route::get('/admin','Backend\DefaultController@index')->name('admin.index');

Route::namespace('Backend')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('settings','SettingsController');
    });
});

Route::namespace('Backend')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('blogs','BlogController');
        Route::post('sortable','BLogController@sortable')->name('blog.Sortable');
    });
});




//Route::get('/admin/deneme', function () {
//   dd(Setting::pluck('value','key')->all());
//});
