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

Route::get('/', function () {
    return view('welcome');
});
// TODO: Get rid of /home. This is just a simple fix to not show the usual home.
Route::get('/home', function() {
    return view('welcome');
});

Auth::routes();
Route::get('/json/posts', 'PostController@index')->name('posts');
Route::post('/', 'PostController@store')->name('store');
