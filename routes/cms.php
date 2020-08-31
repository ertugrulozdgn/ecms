<?php

use Illuminate\Support\Facades\Route;


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
