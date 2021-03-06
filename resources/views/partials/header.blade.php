<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="google-site-verification" content="S-rm4Pi_Xed4Z61tPU8bA6WMDClSMNzhNs_k41oliWU" />
        @if (isset($description))
        <meta name="description" content="{{$description}}">
        @endif
        @if (isset($title))
        <title>{{$title}} - Avaaz</title>
        @else
        <title>{{env('APP_NAME')}}</title>
        @endif
        <link rel="shortcut icon" href="/favicon.ico">
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js" defer></script>
        {{-- <script src="/assets/js/typeahead.bundle.min.js" defer></script> --}}
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
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-80517183-1', 'auto');
        ga('send', 'pageview');

        </script>
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
                    
                    <div class="collapse navbar-collapse navbar-right">
                        <form action="/search" class="navbar-form navbar-left" role="search">
                            <input type="search" name="q" class="form-control typeahead" placeholder="Search&hellip;" required>
                            <button type="submit" class="form-control">Go</button> 
                        </form>
                        <ul class="nav navbar-nav">
                            {{-- <li><a href="/random"><i class="fa fa-random"></i></a></li> --}}
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Popular Topics <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/topics">All Topics</a></li>
                                    @include ('topics.items', ['topics' => $topics])
                                </ul>
                            </li>
                            @if (Auth::check())
                            <li><a href="/profile"><i class="fa fa-lg fa-user"></i></a></li>
                            <li><a href="/settings"><i class="fa fa-lg fa-cog"></i></a></li>
                            <li><a href="/auth/logout"><i class="fa fa-lg fa-sign-out"></i></a></li>
                            @endif
                        </ul>

                        @if (!Auth::check())
                        <a href="/auth" class="btn btn-success navbar-btn">Log in</a>
                        @endif
                    </div>
                </div>
            </nav>
        </header>