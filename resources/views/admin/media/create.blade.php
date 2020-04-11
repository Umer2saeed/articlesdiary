@extends('layouts.dashboard-master')

@section('content')

    <h1 class="text-center heading-bg">Upload Media</h1>

        {!! Form::open(['method' => 'POST', 'action' => 'AdminMediasController@store' , 'id' => 'createMediaForm', 'class' => 'dropzone', 'files'=> true]) !!}

        {!! Form::close() !!}



@endsection
