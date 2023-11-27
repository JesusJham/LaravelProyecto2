<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Web</title>

</head>

<body>
    <p>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('blog') }}">Blog</a>

        {{-- Verifica si el usuario está autenticado --}}
        @auth
        {{-- Muestra un enlace al 'Dashboard' si el usuario está autenticado --}}
        <a href="{{ route('dashboard') }}">Dashboard</a>
        @else
        {{-- Muestra un enlace al 'Login' si el usuario no está autenticado --}}
        <a href="{{ route('login') }}">Login</a>
        @endauth

    </p>

    <hr>

    @yield('content')
</body>

</html>