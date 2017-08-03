<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->get();

        $data = [
            'posts' => $posts,
        ];

        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        $data = ['post' => $post];

        return view('admin.posts.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('admin.posts.index');
    }
}
