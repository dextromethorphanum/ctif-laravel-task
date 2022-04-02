<!DOCTYPE html>
<head>
    @section('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/reset-style.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <title>{{ env('APP_NAME') }}</title>

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show
</head>
<body>
    <div class="main__header">
        <div class="wrapper">
            @section('header')
                <div class="logo__inner">
                    <div class="logo__main">
                        <a href="https://gov.md/"><img src="{{ asset('img/logo.png') }}" alt="Guvernul Republicii Moldova" id="logo"></a>
                        <h2 id="site-name">
                            <a href="{{ url('/') }}">Ministerul Finanțelor</a>
                        </h2>
                    </div>
                    <div class="logo__second">
                        <div class="logo__list">
                            <a href="{{ url('/') }}" class="logo__link">Acasă</a>
                            <a href="#" class="logo__link">Programul ”Prima Casă”</a>
                            <a href="#" class="logo__link">Contacte</a>

                            @section('auth-link')
                                <a href="{{ route('logout') }}" class="logo__link">Log out</a>
                            @show
                            @section('apanel-link')
                                @isset($is_admin)
                                    @if($is_admin)
                                        <a href="{{ route('admin.index') }}" class="logo__link">Admin</a>
                                    @endif
                                @endisset
                            @show

                        </div>
                        <div class="logo__country">
                            <img class="logo__country-item" src="{{ asset('img/flags/md.png') }}" alt="">
                            <img class="logo__country-item" src="{{ asset('img/flags/ru.png') }}" alt="">
                            <img class="logo__country-item" src="{{ asset('img/flags/us.png') }}" alt="">
                        </div>
                    </div>
                </div>
            @show
        </div>
        <div class="navbar">
            <div class="wrapper">
                @section('navbar')
                    <div class="header__inner">
                        <div class="header__menu">
                            <ul>
                                <li><a href="#" class="header__link">Despre Minister</a></li>
                                <li><a href="#" class="header__link">Legislatie</a></li>
                                <li><a href="#" class="header__link">Transparenta decizionala</a></li>
                                <li><a href="#" class="header__link">Media</a></li>
                                <li><a href="#" class="header__link">Finantele publice locale</a></li>
                                <li><a href="#" class="header__link">Asistenta externa</a></li>
                                <li><a href="#" class="header__link">Cariere</a></li>
                            </ul>
                        </div>
                        <form class="header__input">
                            <input class="header__input-item" type="text">
                            <button type="submit"></button>
                        </form>
                        <div class="header__social">
                            <img src="{{ asset('img/facebook-gray.png') }}" alt="">
                            <img src="{{ asset('img/youtube-gray.png') }}" alt="">
                            <img src="{{ asset('img/rss-gray.png') }}" alt="">
                        </div>
                    </div>
                @show
            </div>
        </div>
    </div>


    <div class="main">
        <div class="wrapper main__wrapper">
            @section('content')
                <div class="main__content">
                    <div class="main__nav">
                        <a href="{{ route('admin.index') }}" class="main__nav-link">Acasă</a><p class="main__symbol">»</p><p class="main__text">@yield('page_title', 'Unnamed page')</p>
                    </div>
                </div>
            @show
        </div>
    </div>

    @section('footer-included')
    <footer class="footer">
        <div class="wrapper footer__wrapper">
            @section('footer')

            @show
        </div>
    </footer>
    @show

    @section('footer-scripts')
        <script>
            var kdEco = '' ;
            var kdRaion = '' ;
            var kdLoc = '' ;
        </script>
        <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    @show
</body>
</html>
