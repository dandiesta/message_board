<!doctype html>
<html lang = en>
<head>
    <meta charset="UTF-8">
    <title>Message Board - Login</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
<div class="container">
    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Register</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a href="{{ action('UsersController@login') }}"> Login</a></div>
            </div>
            <div class="panel-body">
                {{ Form::open(['url'=> '/register', 'class' => 'form-horizontal', 'role' => 'form']) }}

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-5 col-md-9">
                            <button id="btn btn-signup" type="submit" class="btn btn-info"><i class="fa fa-hand-o-right"></i> Sign Up</button>
                        </div>
                    </div>

                {{ Form::close() }}
            </div>
        </div>




    </div>
</div>


</body>
</html>
