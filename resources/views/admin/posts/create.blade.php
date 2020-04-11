@extends('layouts.dashboard-master')

@section('content')

    @include('includes.tinyeditor.tinyeditor')

    <h1 class="text-center heading-bg">Create Post</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store' , 'id' => 'createPostForm', 'files' => true]) !!}

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
    <br>
    <div class="form-group">
        {!! Form::button('<i class="entypo-check"></i> Create Post', ['type' => 'submit', 'class' => 'btn btn-success btn-icon icon-left btn-block btn-sm']) !!}

    </div>

    {!! Form::close() !!}




@endsection
