@extends('layouts.dashboard-master')

@section('content')

    @if(Session::has('deleted_user'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Deleted!</strong> {{ session('deleted_user') }}
        </div>
    @endif

    <h1 class="text-center heading-bg">Users</h1>
    <a class="btn btn-default btn-sm add-user-btn btn-icon icon-left" href=" {{ route('users.create', Auth::user()->id) }} ">Add new User <i class="entypo-user-add"></i></a>
    <table class="table table-bordered table-hover datatable" id="table-1">
        <thead>
        <tr>
            <th style="width: 50px">Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>DOB</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td><a href=" {{ route('users.edit', $user->id) }} "><img height="40px" class="img-rounded" src="{{ $user->photo ? $user->photo->file : 'http://via.placeholder.com/640x360' }}" alt=""></a></td>
            <td><a href=" {{ route('users.edit', $user->id) }} ">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->country->name }}</td>
            <td>{{ $user->DOB }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{ $user->created_at ? $user->created_at->diffForHumans() : "" }}</td>
            <td>{{ $user->updated_at ? $user->updated_at->diffForHumans() : "" }}</td>
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>




@endsection
