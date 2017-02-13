<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel | {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- @todo add this to partials -->
        @if (Session::get('flash_success'))
            <div class="alert alert-success">
                @if(is_array(Session::get('flash_success')))
                    <ul>
                        @foreach(Session::get('flash_success') as $msg)
                            <li>{!! $msg !!}</li>
                        @endforeach
                    </ul>
                @else
                    {!! Session::get('flash_success') !!}
                @endif
            </div>
        @endif
        @if (Session::get('flash_warning'))
            <div class="alert alert-warning">
                @if(is_array(Session::get('flash_warning')))
                    <ul>
                        @foreach(Session::get('flash_warning') as $msg)
                            <li>{!! $msg !!}</li>
                        @endforeach
                    </ul>
                @else
                    {!! Session::get('flash_warning') !!}
                @endif
            </div>
        @endif
        @if (Session::get('flash_info'))
            <div class="alert alert-info">
                @if(is_array(Session::get('flash_info')))
                    <ul>
                        @foreach(Session::get('flash_info') as $msg)
                            <li>{!! $msg !!}</li>
                        @endforeach
                    </ul>
                @else
                    {!! Session::get('flash_info') !!}
                @endif
            </div>
        @endif
        @if (Session::get('flash_danger'))
            <div class="alert alert-danger">
                @if(is_array(Session::get('flash_danger')))
                    <ul>
                        @foreach(Session::get('flash_danger') as $msg)
                            <li>{!! $msg !!}</li>
                        @endforeach
                    </ul>
                @else
                    {!! Session::get('flash_danger') !!}
                @endif
            </div>
        @endif
        @if (Session::get('flash_message'))
            <div class="alert alert-info">
                @if(is_array(Session::get('flash_message')))
                    <ul>
                        @foreach(Session::get('flash_message') as $msg)
                            <li>{!! $msg !!}</li>
                        @endforeach
                    </ul>
                @else
                    {!! Session::get('flash_message') !!}
                @endif
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
