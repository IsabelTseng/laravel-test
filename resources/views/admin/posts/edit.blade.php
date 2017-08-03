@extends('admin.layouts.master')

@section('title', '編輯文章')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            編輯文章 <small>編輯文章內容</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 文章管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i> <strong>警告！</strong> 請修正表單錯誤：
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        {{ Form::model($post,['route' => ['admin.posts.update',$post->id], 'method' => 'PATCH', 'role' => 'form'])}}

            @include('admin.posts.partials.form')

            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
            </div>

        {{Form::close()}}

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
