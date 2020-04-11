@extends('layouts.dashboard-master')

@section('content')

    @if(Session::has('deleted_category'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Deleted!</strong> {{ session('deleted_category') }}
        </div>
    @endif

    <h1 class="text-center heading-bg">Categories</h1>

    <div class="row">

        <div class="col-md-4">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store' , 'id' => 'createCategoryForm', 'files'=> true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::button('<i class="entypo-check"></i> Create Category', ['type' => 'submit', 'class' => 'btn btn-success btn-sm btn-block btn-icon icon-left']) !!}
            </div>
        </div>


        <div class="col-md-8">
            <table class="table table-bordered table-hover datatable" id="table-1">
                <thead>
                <tr>
                    <th style="width: 50px">Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><a href="{{ route('categories.edit', $category->id) }}"><img height="50px" class="img-rounded" src="{{$category->photo ? $category->photo->file : 'http://via.placeholder.com/640x360' }}" alt=""></a></td>
                            <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                            <td>{{ $category->created_at ? $category->created_at->diffForHumans() : "No Date Defined"  }}</td>
                            <td>{{ $category->updated_at ? $category->updated_at->diffForHumans() : "No Date Defined" }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>



@endsection
