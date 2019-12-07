<?php

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
Route::get('i-logout', 'HomeController@logout')->name('i-logout');
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/main', function () {
    return view('layouts.main');
});
Route::get('/index', 'OrderController@get_data')->name('index');
Route::get('/backup', function () {
    return view('pages.backup');
});

Auth::routes();

Route::get('/home', 'OrderController@index')->name('home');
Route::post('/create', 'OrderController@store')->name('create');
// Route::post('/create', 'OrderController@store')->name('form.store');
