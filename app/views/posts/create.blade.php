@extends('layout')
@section('content')
    <div class="container">
        <section class="section-padding">
            <center>
                <div class="col-lg-offset-3 col-lg-6">
                    <h1>Create A Post</h1>
                    {{ HTML::ul($errors->all(), array('class'=>'nav alert alert-danger'))}}

                    {{ Form::open(['url'=> '/create', 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form::text('title', null, ['class' => 'form-control shadow', 'placeholder' => 'Insert title', 'required']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::textarea('body', null, ['class' => 'form-control shadow', 'placeholder' => 'Insert body', 'required']) }}
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">Submit this post</button>
                    </div>

                    {{ Form::close() }}
                </div>
            </center>
        </section>
    </div>
@stop