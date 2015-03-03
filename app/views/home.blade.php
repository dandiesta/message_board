@extends('layout')
@section('content')
        <section class="header section-padding">
            <div class="jumbotron text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1><span class="grey">Top 100</span> Posts</h1>
                    </div>
                </div>
            </div>
        </section>
    <div class="container">
        @if (empty($posts))
            <p> No top posts yet!</p>
        @else
            <ul class="nav">
                @foreach ($posts as $v)
                    @foreach ($users as $u)
                        @if ($v->user_id == $u->id)
                            <li>
                                <div class="col-lg-12">
                                    <div class="col-lg-12  shadow" style="background-color: #999966; padding: 9px;" >
                                        <a href="{{ action('PostsController@view', $v->id) }}">
                                            <strong><h4>{{ $v->title }}</h4></strong>
                                        </a>
                                    </div>
                                    <div class="col-lg-12 shadow" style="background-color: #FFFFCC">
                                    <div class="col-lg-11" >

                                            <blockquote> <h4>{{ $v->body }}</h4>
                                        <small>
                                            @if ($_SESSION)
                                                @if ($_SESSION['userid'] != $v->user_id)
                                                    Posted by: <a href="">{{ $u->username }}</a>&nbsp;
                                                @else
                                                    Posted by: <a href="">me</a>&nbsp;
                                                    <a href="{{ action('PostsController@edit', $v->id) }}">
                                                        <i class="fa fa-pencil"></i></a> &nbsp;
                                                    <a href="{{ action('PostsController@delete', $v->id) }}"
                                                       onclick="return confirm('Are you sure you want to delete this thread?')">
                                                        <i class="fa fa-trash"></i></a>
                                                    @endif
                                            @else
                                                Posted by: <a href="">{{ $u->username }}</a>&nbsp;
                                            @endif
                                                <div style="color:#66CCFF">{{ $v->created_at }}</div>
                                        </small>
                                            </blockquote>
                                    </div>
                                    <div class="col-lg-1">
                                        <center>
                                            @if ($_SESSION)
                                                <a href="{{ action('VotesController@voteUp', $v->id) }}"><i class="fa fa-chevron-up fa-2x"></i></a>
                                                <br/> {{ ($v->upvote) - ($v->downvote) }}<br />
                                                <a href="{{ action('VotesController@voteDown', $v->id) }}"><i class="fa fa-chevron-down fa-2x"></i></a><br />
                                            @else
                                                <a onclick="return alert('Must be logged in to vote.')"><i class="fa fa-chevron-up fa-2x"></i></a>
                                                <br/> {{ ($v->upvote) - ($v->downvote) }}<br />
                                                <a onclick="return alert('Must be logged in to vote.')"><i class="fa fa-chevron-down fa-2x"></i></a><br />
                                            @endif
                                        </center>
                                    </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>

            {{--<ul class="nav">--}}
                {{--@foreach ($posts as $v)--}}
                    {{--@foreach ($users as $u)--}}
                        {{--@if ($v->user_id == $u->id)--}}
                            {{--<li>--}}
                                {{--<div class="well col-lg-12 shadow">--}}
                                    {{--<div class="col-lg-11">--}}
                                        {{--<a href="{{ action('PostsController@view', $v->id) }}">--}}
                                            {{--<strong>{{ $v->title }}</strong><br/>--}}
                                        {{--</a>--}}
                                        {{--<small>--}}
                                            {{--@if ($_SESSION)--}}
                                                {{--@if ($_SESSION['userid'] != $v->user_id)--}}
                                                    {{--Posted by: <a href="">{{ $u->username }}</a>&nbsp;--}}
                                                {{--@else--}}
                                                    {{--Posted by: <a href="">me</a>&nbsp;--}}
                                                    {{--<a href="{{ action('PostsController@edit', $v->id) }}">--}}
                                                        {{--<i class="fa fa-pencil"></i></a> &nbsp;--}}
                                                    {{--<a href="{{ action('PostsController@delete', $v->id) }}"--}}
                                                       {{--onclick="return confirm('Are you sure you want to delete this thread?')">--}}
                                                        {{--<i class="fa fa-trash"></i></a>--}}
                                                {{--@endif--}}
                                            {{--@else--}}
                                                {{--Posted by: <a href="">{{ $u->username }}</a>&nbsp;--}}
                                            {{--@endif--}}
                                            {{--<div style="color:#66CCFF">{{ $v->created_at }}</div>--}}
                                        {{--</small>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-lg-1">--}}
                                        {{--<center>--}}
                                            {{--@if ($_SESSION)--}}
                                                {{--<a href="{{ action('VotesController@voteUp', $v->id) }}"><i class="fa fa-chevron-up fa-2x"></i></a>--}}
                                                {{--<br/> {{ ($v->upvote) - ($v->downvote) }}<br />--}}
                                                {{--<a href="{{ action('VotesController@voteDown', $v->id) }}"><i class="fa fa-chevron-down fa-2x"></i></a><br />--}}
                                            {{--@else--}}
                                                {{--<a onclick="return alert('Must be logged in to vote.')"><i class="fa fa-chevron-up fa-2x"></i></a>--}}
                                                {{--<br/> {{ ($v->upvote) - ($v->downvote) }}<br />--}}
                                                {{--<a onclick="return alert('Must be logged in to vote.')"><i class="fa fa-chevron-down fa-2x"></i></a><br />--}}
                                            {{--@endif--}}
                                        {{--</center>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--@endforeach--}}
            {{--</ul>--}}
            {{ $posts->links() }}
        @endif
    </div>
@stop