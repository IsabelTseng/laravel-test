<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts=Post::where('is_feature',1)->orderBy('updated_at','DESC')->get();

        $data = compact('posts');

        return view('index',$data);
    }
}
