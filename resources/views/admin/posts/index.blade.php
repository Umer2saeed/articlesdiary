@extends('layouts.dashboard-master')

@section('content')

    @if(Session::has('deleted_post'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Deleted!</strong> {{ session('deleted_post') }}
        </div>
    @endif

    <h1 class="text-center heading-bg">Posts</h1>
    <a class="btn btn-default btn-sm add-post-btn btn-icon icon-left" href="{{ route('posts.create') }}">Add new Post <i class="entypo-book"></i></a>
    <table class="table table-bordered table-hover datatable" id="table-1">
        <thead>
        <tr>
            <th style="width: 50px">Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Post</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('posts.edit', $post->id) }}"><img height="50px" class="img-rounded" src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/640x360' }}" alt=""></a></td>
                        <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{  Str::limit(strip_tags($post->body), 50) }} </td>
                        <td>{{ $post->user ? $post->user->name : "Has No Owner" }}</td>
                        <td>{{ $post->category ? $post->category->name : "Un-categorized" }}</td>
                        <td><a href="{{ route('home.post', $post->slug)  }}">View Post</a></td>
                        <td><a href="{{ route('comments.show', $post->id)  }}">View Comments</a></td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>




@endsection
