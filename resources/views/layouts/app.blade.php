<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

    <main class="py-4">
        @yield('content')
    </main>
    </div> --}}


    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            @endauth
        </nav>

        @auth
            <aside class="main-sidebar sidebar-dark-primary elevation-4">

                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('logo.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminPedidos</span>
                </a>

                @if (Auth::user()->verificado == true)
                    <div class="sidebar">

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0D8ABC&color=fff" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                            </div>
                        </div>

                        <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="sidebar-search-results">
                                <div class="list-group"><a href="#" class="list-group-item">
                                        <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div>
                                        <div class="search-path"></div>
                                    </a></div>
                            </div>
                        </div>

                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-item">
                                    <a href="{{ url('/home') }}" class="nav-link active">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Inicio
                                        </p>
                                    </a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Categorías
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-hashtag"></i>
                                        <p>
                                            Tags
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>
                                            Blogs
                                            <span class="right badge badge-danger">New</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-comments"></i>
                                        <p>
                                            Comentarios
                                        </p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Usarios
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                @endif

            </aside>
        @endauth


        <div class="content-wrapper" style="min-height: 815px;">
            @if (Auth::user()->verificado == true)
                {{-- Si ya esta verificado entonces se muestra el contenido --}}
                @yield('content')

            @else
                {{-- Si no esta verificado, entonces le pedimos que ingrese el OTP enviado --}}
                <div class="content">
                    <div class="container-fluid">
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Bienvenido <b>{{ auth()->user()->name }}</b></div>

                                    <div class="card-body">
                                        @include('includes.alertas')
                                        <form action="{{ url('/verificar') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="telefono">Telefono ingresado</label>
                                                <input type="text" name="otp" value="{{ auth()->user()->telefono }}" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="otp">Ingresa el codigo OTP que enviamos al telefono ingresado:</label>
                                                <input type="text" name="otp" class="form-control">
                                                @error('otp') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                            <a href="{{ url('/reenviar') }}" class="btn btn-link">Reenviar codigo OTP</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>

        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Desarrollado por @Josema
            </div>

            <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
        <div id="sidebar-overlay"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
