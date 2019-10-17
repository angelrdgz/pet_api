<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('auth/login', 'AuthController@login');
Route::post('auht/register', 'AuthController@register');

Route::middleware('auth')->group(function () {

    Route::get('logout', 'AuthController@logout');

    Route::prefix('admin')->group(function () {
        Route::get('calendar', 'CalendarController@index');
        Route::resource('/zonas', 'ZoneController');
        Route::resource('/servicios', 'ServiceController');
    });    
});
