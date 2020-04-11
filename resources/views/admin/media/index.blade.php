@extends('layouts.dashboard-master')

@section('content')

        @if(Session::has('deleted_photo'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Deleted!</strong> {{ session('deleted_photo') }}
        </div>
        @endif

    <h1 class="text-center heading-bg">All Media</h1>
    <a class="btn btn-default btn-icon icon-left btn-sm add-media-btn" href="{{ route('media.create') }}">Add new Media <i class="entypo-picture"></i></a>

    <form action="{{ route('delete.media') }}" method="post" class="form-inline">
        @method('delete')
        @csrf
        <div class="form-group">
            <select name="checkBoxArray" id="option" class="form-control form-control-sm">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="delete_all_media" class="btn btn-default btn-sm" value="Delete">
        </div>

        <br><br>

        <table class="table table-bordered table-hover datatable" id="table-1">
            <thead>
            <tr>
                <th style="width: 50px"><input type="checkbox" id="options"></th>
                <th style="width: 50px">Id</th>
                <th>Photo</th>
                <th>Created</th>
                <th>Updated</th>
{{--                <th>Action</th>--}}
            </tr>
            </thead>
            <tbody>

            @if($photos)
                @foreach($photos as $photo)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{ $photo->id }}</td>
                        <td><img height="50px" class="img-rounded" src="{{ $photo->file ? $photo->file : 'http://via.placeholder.com/640x360' }}" alt=""></td>
                        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : "No Date" }}</td>
                        <td>{{ $photo->updated_at ? $photo->updated_at->diffForHumans() : "No Date" }}</td>
{{--                        <td class="text-center">--}}
{{--                            <input type="hidden" name="photo_id" value="{{ $photo->id }}">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="submit" name="delete_single" class="btn btn-danger btn-xs" value="Delete">--}}
{{--                            </div>--}}
{{--                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}--}}
{{--                                <div class="form-group">--}}
{{--                                    {!! Form::button('<i class="entypo-trash" ></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-icon icon-left btn-xs']) !!}--}}
{{--                                </div>--}}
{{--                            {!! Form::close() !!}--}}
{{--                        </td>--}}
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>

    </form>

@endsection
