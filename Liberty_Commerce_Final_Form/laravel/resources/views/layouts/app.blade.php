<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/catalogue.css') }}" rel="stylesheet">
</head>
<body>
    <section class="header">
                    
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            @guest
                <section class="right"> 
                    <section class="head"><h2>Le bal masqu&#233;</h2></section>
                    <img src = https://res.cloudinary.com/teepublic/image/private/s--1-hxAXv1--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1505806892/production/designs/1915957_1.jpg height = "30px">
                </section>
            @else
                <section class="right"> 
                    <img src = https://res.cloudinary.com/teepublic/image/private/s--1-hxAXv1--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1505806892/production/designs/1915957_1.jpg height = "0px">
                </section>
                @endguest
            
        </ul>
        
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                    
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </section>
    <section class="main_section">
        @yield('content')
    </section>
    <section class="cookie"></section>
    <section class="footer">
        <a href="https://twitter.com/?lang=fr"><img src = https://cdn.discordapp.com/attachments/766570950200000532/766734071900012544/unknown-1.png height = "100%"></a>


        <a href="https://www.facebook.com/profile.php?id=100004651936794"><img src = https://media.discordapp.net/attachments/766570950200000532/766736022330802206/download-1.png height = "100%"></a>
    </section>
    </div>
</body>
</html>
