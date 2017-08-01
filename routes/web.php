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

Route::get('hello', 'HomeController@hello');

Route::get('QQ', function () {
    return 'QQ';
});

Route::get('bye', function () {
    return redirect('QQ');
});

Route::get('Yo/{name?}', function ($name='GG') {
    return 'Yo,'.$name;
});