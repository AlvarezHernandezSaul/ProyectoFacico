<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @if(auth()->check())

    <div class="d-flex justify-content-between">
        <a class="text-start fs-4 text-dark">Bienvenid@  <b>{{ auth()->user()->name }} </b> </a>
        <div class="text-end">
            <a class="btn btn-danger" href="{{ route('login.destroy') }}">Cerrar Sesión</a>
        </div>
    </div>
    

@else
<div class="d-flex justify-content-between align-items-center">
    <p><a class="link-opacity-100" href="{{ route('registro') }}">Atras</a></p>
    <h1 class="container fs-4 fw-bold text-center">Iniciar Sesión</h1>
    <p><a class="link-opacity-100" href="{{ route('register.index') }}">Registrarse</a></p>
</div>
@endif

@yield('content')
</body>
</html>