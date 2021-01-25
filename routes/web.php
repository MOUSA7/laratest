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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('posts', 'PostController@index')->name('posts');

Route::get('posts/search', 'PostController@search');


Route::get('posts/create', 'PostController@create');
Route::post('posts/create', 'PostController@store')->name('posts.store');
Route::get('posts/show/{slug}', 'PostController@show')->name('posts.show');
Route::get('posts/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::post('posts/edit/{id}', 'PostController@update')->name('posts.update');

Route::get('posts/delete/{id}', 'PostController@delete')->name('posts.delete');


Route::get('get/country/{country_id}','PostController@GetCity');
