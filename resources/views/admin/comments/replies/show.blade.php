@extends('layouts.dashboard-master')

@section('content')

    @if(Session::has('deleted_reply'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Deleted!</strong> {{ session('deleted_reply') }}
        </div>
    @endif

    <h1 class="text-center heading-bg">Replies</h1>
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
            <th>Approve/UnApprove</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($replies)
            @foreach($replies as $reply)
                <tr>
                    <td>{{ $reply->id }}</td>
                    <td>{{ $reply->body }}</td>
                    <td>{{ $reply->author }}</td>
                    <td>{{ $reply->email }}</td>
                    <td>{{ $reply->created_at->diffForHumans() }}</td>
                    <td>{{ $reply->updated_at->diffForHumans() }}</td>
                    <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>
                    <td class="text-center">
                        @if($reply->is_active == 1)
                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::button('<i class="entypo-check"></i> Un-approve', ['type' => 'submit', 'class' => 'btn btn-success btn-icon icon-left btn-sm']) !!}

                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::button('<i class="entypo-info"></i> Un-approve', ['type' => 'submit', 'class' => 'btn btn-info btn-icon icon-left btn-xs']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
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
