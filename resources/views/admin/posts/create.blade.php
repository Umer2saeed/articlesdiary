@extends('layouts.dashboard-master')

@section('content')

    <h1 class="text-center heading-bg">Create Post</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store' , 'id' => 'createPostForm', 'files' => 'true']) !!}

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
        {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter Body']) !!}
    </div>
    <br>
    <div class="form-group">
        {!! Form::submit('Create User', ['class' => 'btn btn-success btn-block']) !!}
    </div>

    {!! Form::close() !!}



@endsection
