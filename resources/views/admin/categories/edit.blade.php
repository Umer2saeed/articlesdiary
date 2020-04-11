@extends('layouts.dashboard-master')

@section('content')


    <a class="btn btn-sm btn-default btn-icon icon-left" href=" {{ route('categories.index') }} ">Go To Categories <i class="entypo-search"></i></a>
    <h1 class="text-center heading-bg">Edit Category</h1>
    <div class="row">

        <div class="col-md-3 margin-bottom">
            <img class="img-responsive img-rounded" src="{{ $category->photo ? $category->photo->file : 'http://via.placeholder.com/640x360'}}" alt="">
        </div>

        <div class="col-xs-9">
            {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id] , 'id' => 'editCategoryForm', 'files'=> true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Category Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::button('<i class="entypo-check"></i> Update Category', ['type' => 'submit' , 'class' => 'btn btn-success btn-icon icon-left col-sm-5 btn-sm']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}

            <div class="form-group ">
                {!! Form::button('<i class="entypo-trash"></i> Delete Category', ['type' => 'submit' ,'class' => 'btn btn-danger btn-icon icon-left col-sm-5 btn-sm pull-right']) !!}

            </div>

            {!! Form::close() !!}
        </div>


        <div class="col-xs-7">

        </div>

    </div>



@endsection
