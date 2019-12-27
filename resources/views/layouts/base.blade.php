<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Título --}}
    <title>{{$p['title']}}</title>

    {{-- Favicon --}}
    <link rel="icon" sizes="196x196" href="https://lumiere-a.akamaihd.net/v1/images/sw-favicon-2018-v1-b-400x400_ba2ac2bc.png?region=0%2C0%2C400%2C400">
    <link rel="shortcut icon" href="https://lumiere-a.akamaihd.net/v1/images/sw-favicon-2018-v1-b-400x400_ba2ac2bc.png?region=0%2C0%2C400%2C400">

    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/b47d4a8f77.js" crossorigin="anonymous"></script>
</head>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center align-self-stretch" id="contenedor">
        <header class="container">
            @yield('cabecera')
        </header>
        @yield('contenido')
        <footer class="container">
            @yield('footer')
        </footer>
    </div>
</body>
</html>