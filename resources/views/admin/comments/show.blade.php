@extends('layouts.dashboard-master')

@section('content')

    @if(Session::has('deleted_comment'))
        <p class="alert alert-danger"> {{ session('deleted_comment') }} </p>
    @endif

    <h1 class="text-center heading-bg">Comments For Specific Post</h1>
    <table class="table table-bordered table-hover datatable" id="table-1">
        <thead>
        <tr>
            <th style="width: 50px">Id</th>
            <th>Body</th>
            <th>Author</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Post</th>
            <th>Replies</th>
            <th>Approve/UnApprove</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->author }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                    <td>{{ $comment->updated_at->diffForHumans() }}</td>
                    <td><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></td>
                    <td><a href="{{ route('replies.show', $comment->id) }}">View Replies</a></td>
                    <td class="text-center">
                        @if($comment->is_active == 1)
                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::button('<i class="entypo-check"></i> Un-approve', ['type' => 'submit', 'class' => 'btn btn-success btn-icon icon-left btn-sm']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::button('<i class="entypo-info"></i> Approve', ['type' => 'submit', 'class' => 'btn btn-info btn-icon icon-left btn-sm']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::button('<i class="entypo-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-icon icon-left btn-sm']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>


@endsection
