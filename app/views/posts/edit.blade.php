@extends('layout')
@section('content')
    <div class="container">
        <section class="section-padding">
            <center>
                <div class="col-lg-offset-3 col-lg-6">
                    <h1>Edit Task {{ $post->id }}</h1>
                    {{ Form::open(['url'=> '/edit', 'class'=>'form']) }}
                    {{ Form::hidden('id', $post->id)}}

                    <div class="form-group">
                        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Insert title']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Insert body']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Save Post', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </center>
        </section>
    </div>
@stop