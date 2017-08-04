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

#網站前台
Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');
Route::get('posts/{id}', 'PostsController@show')->name('posts.show');
Route::get('contact', 'ContactController@index');
Auth::routes();

#網站後台
Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('dashboard', 'AdminDashboardController@index')->name('admin.dashboard.index');
    Route::get('posts', 'AdminPostsController@index')->name('admin.posts.index');
    Route::get('posts/create', 'AdminPostsController@create')->name('admin.posts.create');
    Route::post('posts', 'AdminPostsController@store')->name('admin.posts.store');
    Route::get('posts/{id}/edit', 'AdminPostsController@edit')->name('admin.posts.edit');
    Route::patch('posts/{id}', 'AdminPostsController@update')->name('admin.posts.update');
    Route::delete('posts/{id}', 'AdminPostsController@destroy')->name('admin.posts.destroy');
});
