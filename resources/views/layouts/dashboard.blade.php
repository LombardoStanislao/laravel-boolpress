<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <script src="https://kit.fontawesome.com/7b09a46f67.js" crossorigin="anonymous"></script>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm admin-navbar">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    Boolpress
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item">
                                <a  class="nav-link text-white" href="{{route('homepage')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Visualizzazione utente
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        Dashboard
                                    </a>
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
                </div>
            </div>
        </nav>

        <div class="layout clearfix">
            <div class="navbar-left">
                <ul class="pt-50">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="dashboard-icons">
                                <i class="fas fa-house-user fa-2x"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mt-25">
                        <a href="{{ route('admin.posts.index') }}">
                            <div class="dashboard-icons">
                                <i class="fas fa-clipboard fa-2x"></i>
                            </div>
                             <span>Posts</span>
                        </a>
                    </li>
                    <li class="mt-25">
                        <a href="{{ route('admin.index') }}">
                            <div class="dashboard-icons">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                             <span>Users</span>
                        </a>
                    </li>
                    <li class="mt-25">
                        <a href="{{ route('admin.index') }}">
                            <div class="dashboard-icons">
                                <i class="fas fa-list-ol fa-2x"></i>
                            </div>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="mt-25">
                        <a href="{{ route('admin.index') }}">
                            <div class="dashboard-icons">
                                <i class="fas fa-tag fa-2x"></i>
                            </div>
                            <span>Tags</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-page">
                @yield('content')

            </div>
        </div>

    </body>
</html>
