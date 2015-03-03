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
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Login</div>
                {{--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>--}}
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <div class="alert alert-danger" style="display:<?php echo $invalid?>">Invalid username/password</div>
                <div class="alert alert-success" style="display:<?php echo $logout?>">You have logged out successfully.</div>

                {{ Form::open(['url'=> '/login', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) }}

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            {{ Form::submit('Login', array('class' => 'btn btn-success', 'id' => 'btn-login')); }}
                            {{--<a id="btn-login" href="/login" class="btn btn-success">Login  </a>--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account?
                                <a href="{{ action('UsersController@register') }}">Sign Up</a> here
                                {{--<a href=""--}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
