<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar has-shadow">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="{{ url('/') }}">
                            <img src="http://www.informational.ca/images/header.gif" alt="" width="112" height="28">
                        </a>


                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start"></div>

                        <div class="navbar-end">
                            @if (Auth::guest())
                            <a class="navbar-item" href="{{ url('/') }}">
                                       Home
                                    </a>
                                    
                            <a class="navbar-item" href="{{ url('/home/moviegame') }}">
                                Movie Game
                            </a>
                            <a class="navbar-item" href="{{ url('/sites') }}">
                                Sites
                            </a>
                            <a class="navbar-item" href="{{ url('/site/categories') }}">
                                Categories
                            </a>
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>


                            @else
                            	
                                    <a class="navbar-item" href="{{ url('/') }}">
                                        Home
                                    </a>
                                    <a class="navbar-item" href="{{ url('/home/moviegame') }}">
                                Movie Game
                            </a>
                            <a class="navbar-item" href="{{ url('/sites') }}">
                                            Sites
                                        </a>
                                        <a class="navbar-item" href="{{ url('/categories') }}">
                                            Categories
                                        </a>
                            
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>
                                    

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{ url('/home') }}">
                                       My Home
                                    </a>
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
                                
                            @endif

                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
