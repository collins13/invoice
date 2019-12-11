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
// entrust
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
Route::resource('roles','RoleController');
Route::resource('users','UserController');
// endendtrust
Route::get('i-logout', 'HomeController@logout')->name('i-logout');
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/main', function () {
    return view('layouts.main');
});
// Route::get('/email', function () {
//     return view('mails.users');
// });
Route::get('/index', 'OrderController@get_data')->name('index');
Route::post('/store', 'UserController@store')->name('store');
Route::get('/backup', function () {
    return view('pages.backup');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create', 'OrderController@store')->name('create');
// Route::post('/create', 'OrderController@store')->name('form.store');

Route::get('/user', 'ProfileController@user');

Route::post('/user/profile', 'ProfileController@createProfile');

Route::post('/user/profile/{id}', 'ProfileController@editProfile');

Route::post('/user/profile', 'ProfileController@addUser');
