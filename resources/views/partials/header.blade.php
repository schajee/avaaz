<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Avaaz</title>
        <link rel="shortcut icon" href="/favicon.ico">
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js" defer></script>
        <script src="/assets/js/chartist.min.js"></script>
        <script src="/assets/js/app.js" defer></script>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/css/chartist.min.css" rel="stylesheet">
        <link href="/assets/css/app.css" rel="stylesheet">    
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Avaaz</a>
                    </div>
                    <form action="/search" class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            <input type="search" name="q" class="form-control" placeholder="Search&hellip;" required>
                            <span class="input-group-btn">
                                <button class="btn btn-success" title="Search" type="submit"><i class="fa fa-fw fa-lg fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/help/about">About</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Topics <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($topics as $topic)
                                    <li><a href="/topics/{{$topic->slug}}">{{$topic->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-success navbar-btn" data-toggle="modal" data-target="#modal" data-size="modal-sm">Sign in</button>
                    </div>
                </div>
            </nav>
        </header>