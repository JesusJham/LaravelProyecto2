<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Web</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="containerr px-12 mx-auto">
        <header class="flex jus tify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" class="h-12">
                </a>
                <form action="">
                    <input type="text" placeholder="Buscar">
                </form>
            </div>

            {{-- Verifica si el usuario está autenticado --}}
            @auth
            {{-- Muestra un enlace al 'Dashboard' si el usuario está autenticado --}}
            <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
            {{-- Muestra un enlace al 'Login' si el usuario no está autenticado --}}
            <a href="{{ route('login') }}">Login</a>
            @endauth
        </header>

		<div class="opacity-60 h-px mb-8" style="
			background: linear-gradient(to right, 
				rgba(200, 200, 200, 0) 0%,
				rgba(200, 200, 200, 1) 30%,
				rgba(200, 200, 200, 1) 70%,
				rgba(200, 200, 200, 0) 100%
			);
		">

		</div>

        @yield('content')

        <p cla  ss="py-16">
			<img src="{{ asset('images/logo.png') }}" class="h-12 mx-auto">
		</p>
    </div>
</body>

</html>