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

Route::get('orm', function () {

    // INSERT INTO `posts` (`title`, `sub_title`, `content`, `is_feature`, `created_at`, `updated_at`)
    // VALUES ('測試文章標題', '測試文章副標題', '測試文章內容', '0', now(), now());
//    \App\Post::create([
//        'title' => '文章標題',
//        'sub_title' => '文章副標題',
//        'content' => '文章內容',
//    ]);

//    $post = new \App\Post();
//    $post->title = '物件方式標題';
//    $post->sub_title = '物件方式副標題';
//    $post->content = '物件方式內容';
//    $post->save();

    // SELECT * FROM posts
//    $posts = \App\Post::all();
//    echo '<ul>';
//    foreach ($posts as $post) {
//        echo '<li>'.$post->title.'</li>';
//    }
//    echo '</ul>';

    // SELECT * FROM posts
    // WHERE id = 1
//    $post = \App\Post::find(1);
//    echo '<h3>'.$post->title.'</h3>';

    // SELECT * FROM posts
    // WHERE id > 3 AND is_feature = 1
    // ORDER BY updated_at DESC
//    $posts = \App\Post::where('id', '>', 3)
//        ->where('is_feature', '=', 1)
//        ->orderBy('updated_at', 'DESC')
//        ->get();
//    echo '<ul>';
//    foreach ($posts as $post) {
//        echo '<li>'.$post->title.'</li>';
//    }
//    echo '</ul>';

    //UPDATE `posts` SET
//    `id` = '1',
//    `title` = '更新標題',
//    `sub_title` = '更新副標題',
//    `content` = '更新內容',
//    `is_feature` = '1',
//    `created_at` = '2017-07-24 06:13:45',
//    `updated_at` = '2017-08-02 07:31:17'
//    WHERE `id` = '1';
//    $post = \App\Post::find(1);
//    $post->update([
//        'title' => '更新標題',
//        'sub_title' => '更新副標題',
//        'content' => '更新內容',
//    ]);

//    $post = \App\Post::find(2);
//    $post->title = '物件方式更新標題';
//    $post->sub_title = '物件方式更新副標題';
//    $post->content = '物件方式更新內容';
//    $post->save();

//      $post = \App\Post::find(3);
//      $post->delete();

//      \App\Post::destroy([5,7,9]);

});