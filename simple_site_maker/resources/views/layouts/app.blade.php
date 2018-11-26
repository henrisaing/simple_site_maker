<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flat.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
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
                    @if (Auth::check())
                    <a href="{{url('/sites')}}" class="navbar-brand">
                        My Sites
                    </a>
                    @endif
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

<!-- side nav -->
    @if (!Auth::guest())
      <div id="mySidenav" class="sidenav">
        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->

        <a href="#" class="lightbox-open" func="/sites/new">New Site</a>
        <a href="/sites">My Sites</a>

        <?php foreach (Auth::user()->sites()->get() as $site): ?>
          <a href="/site/{{$site->id}}/summary">
              <?php echo $site->name ?>
          </a>
        <?php endforeach ?>
      </div>
    @endif
<!-- end side nav -->

    

    <div id="main">
    @if (!Auth::guest())
      <div class="sidenav-control">
        <button class="side-nav-btn" id="open-nav" onclick="openNav()">></button>
      </div>
    @endif

        @yield('content')
    </div>

    </div>
    <!-- lightbox popup div -->
    <div id="light" class="white_content">
        <div id="lightbox-content"></div> 
        <div class="lb-close">
            <!-- <a href="#" class="lightbox-close">Close</a> -->
            {!! Form::button('close',[
              'class' => 'lightbox-close bg-red',
            ]) !!}
        </div>
    </div>
    <div id="fade" class="black_overlay"></div>
    <!-- lightbox popup div end -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
