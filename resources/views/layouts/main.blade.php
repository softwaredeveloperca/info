<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum - Free Bulma template</title>
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.6.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar is-white topNav">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="http://www.informational.ca/images/header.gif" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
            </a>
            <div class="navbar-burger burger" data-target="navMenu">
                @if (Auth::check())
                <a href="{{ url('/home') }}">My Profile</a>
                @else
                <span><a class="navbar-item " href="{{ route('login') }}">Login</a></span>
                <span><a href="{{ url('/register') }}">Register</a></span>
                @endif
            </div>
        </div>

        <div id="topNav" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="{{ url('/sites') }}">
                    Sites
                </a>
                <a class="navbar-item" href="{{ url('/categories') }}">
                    Categories
                </a>



            </div>



            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field is-grouped">
                        @if (Auth::check())
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        @else
                        <a class="navbar-item " href="{{ route('login') }}">Login</a>
                        <a class="navbar-item " href="{{ route('register') }}">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<section class="container">
    @if(isset($paths) && count($paths) > 1)
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            @foreach($paths as $path)
                    <li @if($path->active) class="is-active" @endif>
                            <a href="{{url($path->url)}}" aria-current="page">{{$path->name}}</a>
                    </li>
            @endforeach
        </ul>
    </nav>
    @endif
    @yield('content')

</section>

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <strong>Informational.ca</strong> Is a collection of information related website on various topics.
            </p>

        </div>
    </div>
</footer>
</body>
</html>