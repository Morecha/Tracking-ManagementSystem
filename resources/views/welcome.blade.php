<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <title>welcome</title>
        {!! @$map->styles() !!}
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{ asset('dist/img/logo/pepega.png') }}" rel="shortcut icon" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            body { margin: 0; padding: 0; }
            #map { top: 5.7%; bottom: 0%; width: 100%; }
        </style>
    </head>
    <body class="">
        {{-- navbar --}}
        <nav class="navbar navbar-dark bg-dark justify-content-between position-static">
            <div class="container-fluid">
                <a class="navbar-brand">Navbar</a>
                @if (Route::has('login'))
                    @auth
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><a href="{{ url('/admin/dashboard') }}" class="nav-link">Dashboard</a></button>
                    @else
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><a href="{{ route('login') }}" class="nav-link">Log in</a></button>
                    @endauth
                @endif
            </div>
        </nav>

        <div id="map">
            {!! @$map->render() !!}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        {!! @$map->scripts() !!}
    </body>
</html>
