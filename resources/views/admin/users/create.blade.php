@extends('layouts.dashboard-master')

@section('content')

    <h1 class="text-center heading-bg">Create User</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store' , 'id' => 'createUserForm', 'files'=> 'true']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('DOB', 'DOB') !!}
            {!! Form::date('DOB', null, ['class' => 'form-control', 'placeholder' => 'Enter DOB']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('country_id', 'Country') !!}
            {!! Form::select('country_id', ['' => 'Select Country'] + $countries , null , ['class' => 'selectboxit']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', ['' => 'Select Role'] + $roles , null , ['class' => 'selectboxit']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0 , ['class' => 'selectboxit']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) !!}
        </div>
    <br>
        <div class="form-group">
            {!! Form::submit('Create User', ['class' => 'btn btn-success btn-block']) !!}
        </div>

    {!! Form::close() !!}



@endsection
