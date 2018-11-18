<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Techo farm</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    @yield('stylesheets')
</head>
<body class="@yield('body_class')">

<div class="@section('container_class') @endsection container">
    <nav class="navbar navbar-expand-lg navbar-light bg-info mb-4   ">
        <a class="navbar-brand" href="{{ url('/') }}">Techno Farm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contract') }}">Нов Договор</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/property')}}">Нов Имот</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/landlord')}}">Нов Арендодател</a>
                </li>

            </ul>
            <ul class="navbar-nav float-right my-2 my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Справки
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/reports/due') }}">Дължима рента</a>
                        <a class="dropdown-item" href="{{ url('/reports/own') }}">Собствени имоти</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @yield('body')
</div>
<script src="{{mix('js/app.js')}}"></script>
@yield('javascripts')
</body>
</html>
