<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }
}
