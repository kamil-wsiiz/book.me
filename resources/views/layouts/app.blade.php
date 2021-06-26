<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="header">
                <span>{{ config('app.name') }}</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                @auth
                    <div class="dropdown">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->email }}
                        </a>

                        <ul class="dropdown-menu text-small" aria-labelledby="profile">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">{{ __('Profil') }}</a></li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form ref="logout" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>

                                <a class="dropdown-item" href="{{ route('logout') }}" @click.prevent="this.$refs.logout.submit()">{{ __('Wyloguj') }}</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('register') }}">{{ __('Załóż konto') }}</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-4 pt-3 border-top">
        <div class="row">
            <span>{{ config('app.name') }}</span>
            <small class="d-block mb-3 text-muted">&copy; {{ date('Y') }}</small>
        </div>
    </footer>
</div>

@yield('scripts')

</body>
</html>
