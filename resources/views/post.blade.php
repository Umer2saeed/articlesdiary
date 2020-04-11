@extends('layouts.blog-post')

@section('content')

    @if($post->category)
        <a href="{{ route('posts.by.categories', $post->category->slug) }}" class="badge badge-success">{{ $post->category ? $post->category->name : "" }}</a>
        @else
        <a href="#" class="badge badge-success">Uncategorized</a>
    @endif
    <div class="mb-4">
    <h2 class="m-0">{{ $post->title }}</h2>
        <?php
        $post_date = $post->created_at;
        $unixTimestamp = strtotime($post_date);
        $dayOfWeek = date("l", $unixTimestamp);
        ?>
    <small class="m-0"><i> <i class="ion ion-ios-calendar"></i> <a href="{{ route('home.post', $post->slug) }}"><span class="post-description">{{ $dayOfWeek }} {{ $post->created_at->day }}, {{ $post->created_at->year }} </span></a> <i class="ion ion-ios-person"></i> <a class="post-description" href="">{{ $post->user->name }}</a> </i>  <i class="ion icon-comment"></i> <a class="post-description" href="{{ route('home.post', $post->slug) }}">Comment({{ count($post->comments) }})</a> </small>
    </div>
    <p>{!! $post->body !!}</p>
    <div class="tag-widget post-tag-container mb-5 mt-5">
        <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Life</a>
            <a href="#" class="tag-cloud-link">Sport</a>
            <a href="#" class="tag-cloud-link">Tech</a>
            <a href="#" class="tag-cloud-link">Travel</a>
        </div>
    </div>

    <div class="about-author d-flex p-4 bg-light">
        <div class="bio mr-5">
            <img height="100" src="{{ $post->user->photo ? $post->user->photo->file : URL::asset('front-assets/images/user-male.png') }}" alt="Image placeholder" class="mb-4">
        </div>
        <div class="desc">
            <h3>{{ $post->user->name }}</h3>
            <p>Umer is a Software Engineer, Designer, Content Writer, Blog Writer</p>
        </div>
    </div>

    @if(Session::has('comment_message'))
        <p class="alert alert-success"> {{ session('comment_message') }} </p>
    @endif

    @if(Auth::check())
        <div class="comment-form-wrap pt-3">
            <h4 class="">Leave a comment</h4>
            {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store' , 'id' => 'messageForm', 'class'=>'p-3 bg-light', 'files' => true]) !!}

                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <small>{!! Form::label('body', 'Message') !!}</small>
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => 'Enter Message', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Post Comment', ['class' => 'btn btn-secondary btn-sm']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    @endif

    <div class="pt-3 mt-3">
        <h6 class="mb-4">
            @if(count($post->comments) == 1)
            <small>
                    {{ count($post->comments) }}
                    Comment
            </small>
                @else
                <small>
                    {{ count($post->comments) }}
                    Comments
                </small>
            @endif
        </h6>

        <ul class="comment-list">
        @if(count($comments) > 0)
            @foreach($comments as $comment)
            <li class="comment">
                <div class="vcard bio">
                    <img src="{{ $comment->photo ? $comment->photo : URL::asset('front-assets/images/user-male.png') }}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                    <div class="d-flex">
                        <div class="wrap-comment-content w-100">
                            <h3 class="mb-0">{{ $comment->author }}</h3>
                            <?php
                            $comment_date = $comment->created_at;
                            $unixTimestamp = strtotime($comment_date);
                            $dayOfWeek = date("l", $unixTimestamp);
                            ?>
                            <div class="meta"><small>{{ $comment->created_at->diffForHumans() }} at {{ $dayOfWeek }}</small></div>
                            <p>{{ $comment->body }}</p>
                        </div>
                        <button class="reply-toggle-btn btn btn-secondary btn-sm mb-3 text-right align-self-end">Reply</button>
                    </div>
                    <div class="comment-reply-toggle-form">
                        {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply', 'class'=>'p-3 bg-light', 'files' => true]) !!}
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <div class="form-group">
                            <small>{!! Form::label('body', 'Message') !!}</small>
                            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>'1', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Reply', ['class' => 'btn btn-secondary btn-sm']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        {{--   Nested Comment   --}}
                        <ul class="children">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ $reply->photo }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">

                                    <div class="d-flex">
                                        <div class="wrap-comment-content w-100">
                                            <h3 class="mb-0">{{ $reply->author }}</h3>
                                            <div class="meta"> <small>{{ $reply->created_at->diffForHumans() }} at {{ $dayOfWeek }}</small></div>
                                            <p>{{ $reply->body }}</p>
                                        </div>
                                        <button class="reply-toggle-btn btn btn-secondary btn-sm mb-3 text-right align-self-end">Reply</button>
                                    </div>

                                    <div class="comment-reply-toggle-form">
                                        {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply', 'class'=>'p-3 bg-light', 'files' => true]) !!}
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <div class="form-group">
                                            <small>{!! Form::label('body', 'Message') !!}</small>
                                            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>'1', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Reply', ['class' => 'btn btn-secondary btn-sm']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>

                                </div>
                            </li>
                        </ul>
                        {{--  End Nested Comment   --}}
                        @endif
                    @endforeach
                @endif
            </li>
            @endforeach
        @endif
        </ul>
        <!-- END comment-list -->
    </div>

@endsection

@section('scripts')

    <script>
        $('.reply-toggle-btn').click(function () {
            $(this).parent().siblings().slideToggle('fast');
        });
    </script>

@endsection
