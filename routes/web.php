<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('ingresar', 'AuthController@login')->name('ingresar');
Route::get('registro', 'AuthController@register')->name('registro');
Route::post('/login', 'AuthController@loginPost')->name('login');
Route::post('/register', 'AuthController@registerPost')->name('register');
//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {

    Route::get('logout', 'AuthController@logout');

    Route::prefix('admin')->group(function () {
        Route::get('calendario', 'CalendarController@index');
        Route::resource('/zonas', 'ZoneController');
        Route::resource('/servicios', 'ServiceController');
    });    
});
