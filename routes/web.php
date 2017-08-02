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

Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');
Route::get('posts/{id}', 'PostsController@show');
Route::get('contact', 'ContactController@index');

Route::get('orm', function(){

    \App\Post::create([
        'title' => '文章標題',
        'sub_title' => '文章副標題',
        'content' => '文章內容',
    ]);
});
