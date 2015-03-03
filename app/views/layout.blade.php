<!doctype html>
<html lang = en>
<head>
    <meta charset="UTF-8">
    <title>Learning Laravel</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Message Board</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if ($_SESSION)
                    <ul class="nav navbar-nav">
                        <li><a href="{{ action('PostsController@create') }}">Create a post</a></li>
                    </ul>
                @endif
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li class="divider"></li>
                    @if ($_SESSION)
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Hi, <?php echo User::find($_SESSION['userid'])->username ?>! <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('UsersController@logout') }}">Logout</a></li>
                            </ul></li>

                    @else
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Not a member? <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('UsersController@login') }}">Login</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ action('UsersController@register') }}">Register</a></li>
                            </ul></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </header>

    @yield('content')

    <div class="bottom-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2 navbar-brand">
                    <a href="/">Message Board</a>
                </div>

                <div class="col-md-10">
                    <ul class="bottom-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>
</html>