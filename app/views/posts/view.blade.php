@extends('layout')
@section('content')
    <section class="header section-padding">
        <div class="jumbotron">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="col-lg-offset-1">
                        @foreach ($users as $u)
                            @if ($post->user_id == $u->id)
                                <strong><h1>{{ $post->title }}<small> By: {{ $u->username }}</small></h1></strong><hr />
                                <h5>{{ $post->body }}</h5>
                            @endif
                        @endforeach
                </div>
                    </div>
            </div>
        </div>
    </section>

    <div class="container">
        {{ HTML::ul($errors->all(), array('class'=>'nav alert alert-danger'))}}
        @if (empty($comments))
            <div class="well shadow">
                <p> No comments yet!</p>
            </div>
        @else
            <ul class="nav">
                @foreach ($comments as $v)
                    @foreach ($users as $u)

                        @if ($v['commentor_id'] == $u->id)
                            <div class="well shadow col-lg-12">
                            <div class="col-lg-10">
                                <blockquote>{{ $v->body }}</blockquote>

                                <div class="meta">
                                   @if ($_SESSION['userid'] != $v->user_id)
                                        by: {{ $u->username }}&nbsp;
                                   @else
                                        by: {{ $u->username }}&nbsp;
                                        <a href="">
                                            <i class=""></i></a> &nbsp;
                                        <a href="{{ action('PostsController@edit', $v->id) }}">
                                            <i class="fa fa-pencil"></i></a> &nbsp;
                                        <a href="{{ action('PostsController@delete', $v->id) }}"
                                           onclick="return confirm('Are you sure you want to delete this thread?')">
                                            <i class="fa fa-trash"></i></a>
                                    @endif
                                </div>
                                <div style="color:#FF9999;"><small>{{ $v->created_at }} </small></div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        @endif
        <hr />
            {{ Form::open(['url'=> '/comment', 'class' => 'form-horizontal']) }}
                {{ HTML::ul($errors->all(), array('class'=>'nav alert alert-danger'))}}
                {{ Form::hidden('id', $post->id)}}
                <div class="form-group col-lg-10">
                    {{ Form::textarea('body', null, ['class' => 'form-control shadow', 'placeholder' => 'Write comment', 'rows' => 4, 'tabindex' => 1, 'required']) }}
                </div>
                @if ($_SESSION)
                    <div class="form-group col-lg-12">
                        <button class="btn btn-danger" type="submit" tabindex= 2>Comment</button>
                    </div>
                @else
                    <div class="form-group col-lg-12">
                        <a class="btn btn-danger" onclick="return alert('Must be logged in to comment.')">Comment</a>
                    </div>
                @endif
            {{ Form::close() }}
    </div>
@stop