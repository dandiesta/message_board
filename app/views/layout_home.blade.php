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
<section class="header section-padding">
    <div class="background">&nbsp;</div>
    <div class="container">
        <div class="header-text">
            <h1>Message Board</h1>
            <p>
                Open up, post your opinions
                <br /> Share your sentiments with me!
            </p>
        </div>
    </div>
</section>

<div class="container">
    <section class="section-padding">
        <div class="jumbotron text-center">
            <h1><span class="grey">WELCOME TO</span> OUR HOME</h1>
            <p>
                Want to say something? Great way to voice out!
            </p>
        </div>
    </section>
</div>

<div class="jumbotron text-center">
    <div class="row">
        <div class="showcase-box col-md-4">
            <div class="showcase-item">
                <img src="{{ asset('img/icon1.png') }}" />
                <p>
                    Post
                </p>
            </div>
        </div>
        <div class="showcase-box col-md-4">
            <div class="showcase-item">
                <img src="{{ asset('img/icon2.png') }}" />
                <p>
                    Comment
                </p>
            </div>
        </div>
        <div class="showcase-box col-md-4">
            <div class="showcase-item">
                <img src="{{ asset('img/icon3.png') }}" />
                <p>
                    Vote
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>