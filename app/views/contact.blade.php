@extends('layout')
@section('content')

    <section class="header section-padding">
        <div class="background">&nbsp;</div>
        <div class="container">
            <div class="header-text">
                <h1>Contact Us</h1>
                <p>
                    Feel free to contact us!
                </p>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="section-padding">
            <center><h1>HAVE ANY QUESTIONS?</h1></center>
            <div class="col-lg-6">
                <p>Please contact us by sending a message using the form below:</p>
                <label style="color:red">{{ HTML::ul($errors->all(), array('class'=>'errors'))}}</label>
                {{ Form::open(array('url' => 'contact')) }}
                    <div class="form-horizontal">
                        <div class="form-group">
                            {{ Form::label('Subject') }}
                            {{ Form::text('subject','Enter you subject') }}
                        </div>
                        <br />
                        <div class="form-group">
                            {{ Form::label('Message') }}
                            {{ Form::textarea('message','Enter your message') }}
                        </div>
                        <br />
                        {{--{{ Form::submit() }}--}}
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">Submit</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>

@stop