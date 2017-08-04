@extends('admin.layouts.master')

@section('title', '新增文章')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增文章 <small>請輸入文章內容</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 文章管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

@include('admin.posts.partials.alert')

<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => 'admin.posts.store', 'method' => 'POST', 'role' => 'form'])}}
            @include('admin.posts.partials.form')

            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

        {{Form::close()}}

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
    </div>
</div>
<!-- /.row -->
@endsection
