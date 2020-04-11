@extends('layouts.dashboard-master')

@section('content')

    @include('includes.tinyeditor.tinyeditor')

    <a class="btn btn-sm btn-default btn-icon icon-left" href=" {{ route('posts.index') }} ">Go To Posts <i class="entypo-search"></i></a>
    <h1 class="text-center heading-bg">Edit Post</h1>

    <div class="col-md-3">
        <img class="img-responsive img-rounded" src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/640x360'}}" alt="">
    </div>

    <div class="col-md-9">

    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id] , 'id' => 'createPostForm', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', ['' => 'Choose Category'] + $categories , null, ['class' => 'selectboxit']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::button('<i class="entypo-check"></i> Update Post', ['type' => 'submit', 'class' => 'btn btn-success col-xs-5 btn-icon icon-left btn-sm']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}

    <div class="form-group ">
        {!! Form::button('<i class="entypo-trash"></i> Delete Post', ['type' => 'submit', 'class' => 'btn btn-danger col-xs-5 btn-icon icon-left btn-sm pull-right']) !!}

    </div>

    {!! Form::close() !!}

    </div>

@endsection
