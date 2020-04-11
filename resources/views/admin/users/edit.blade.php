@extends('layouts.dashboard-master')

@section('content')
    <a class="btn btn-default btn-sm btn-icon icon-left" href=" {{ route('users.index') }} ">Go To Users <i class="entypo-search"></i></a>
    <h1 class="text-center heading-bg">Edit User</h1>

    <div class="col-md-3">
        <img class="img-responsive img-rounded" src="{{ $user->photo ? $user->photo->file : 'http://via.placeholder.com/640x360'}}" alt="">
    </div>

    <div class="col-md-9">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id] , 'id' => 'editPostForm', 'files'=> true]) !!}

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
            {!! Form::select('role_id', ['' => 'Choose Options'] + $roles , null , ['class' => 'selectboxit']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null , ['class' => 'selectboxit']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}
        </div>

    {{--    <div class="form-group">--}}
    {{--        {!! Form::label('password', 'Password') !!}--}}
    {{--        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) !!}--}}
    {{--    </div>--}}

        <div class="form-group">
            {!! Form::button('<i class="entypo-check"></i> Update User', ['type' => 'submit', 'class' => 'btn btn-success col-xs-5 btn-icon icon-left btn-sm']) !!}

        </div>

        {!! Form::close() !!}

        {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

            <div class="form-group ">
                {!! Form::button('<i class="entypo-trash"></i> Delete User', ['type' => 'submit', 'class' => 'btn btn-danger col-xs-5 btn-icon icon-left btn-sm pull-right']) !!}
            </div>

        {!! Form::close() !!}

    </div>





@endsection
