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
    return view('index');
});
Route::get('/about',function(){
    // return 'about';
    return view('about');
});
Route::get('/service',function(){
    return view('service');
});
Route::resource('/post','PostController')->middleware('auth');
Route::resource('/cate','CateController')->middleware('auth');

// Route::get('/trash','TrashController@index')->name('trash');
// Route::get('/trash/restore/{id}','TrashController@restore')->name('trash.restore');
// Route::delete('/trash/delete','TrashController@detroy')->name('trash.delete');

Route::prefix('trash')->group(function(){
    Route::get('/','TrashController@index')->name('trash.index')->middleware('auth');
    Route::get('/restore/{id}','TrashController@restore')->name('trash.restore')->middleware('auth');
    Route::delete('/delete','TrashController@destroy')->name('trash.delete')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/tag/{tag}','PostTagController@postsWithTag')->name('postsTag');
