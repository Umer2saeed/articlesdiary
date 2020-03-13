@extends('layouts.dashboard-master')

@section('content')

    <h1 class="text-center heading-bg">Posts</h1>
    <a class="btn btn-success add-user-btn" href="{{ route('posts.create') }}">Add new Post</a>
    <table class="table table-bordered table-hover datatable" id="table-1">
        <thead>
        <tr>
            <th style="width: 50px">Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><img height="50px" class="img-rounded" src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/640x360' }}" alt=""></td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category ? $post->category->name : "Un-categorized" }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>




@endsection
