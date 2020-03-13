@extends('layouts.dashboard-master')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="alert alert-danger"> {{ session('deleted_user') }} </p>
    @endif

    <h1 class="text-center heading-bg">Users</h1>
    <a class="btn btn-success add-user-btn" href=" {{ route('users.create', Auth::user()->id) }} ">Add new User</a>
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
            <td><img height="40px" class="img-rounded" src="{{ $user->photo ? $user->photo->file : 'http://via.placeholder.com/640x360' }}" alt=""></td>
            <td><a href=" {{ route('users.edit', $user->id) }} ">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->country->name }}</td>
            <td>{{ $user->DOB }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td>{{ $user->updated_at->diffForHumans() }}</td>
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>




@endsection
