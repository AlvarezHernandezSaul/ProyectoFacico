<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    {{-- Verificar si el usuario ha iniciado sesión --}}
    @if(auth()->check())

    {{-- Mostrar información de bienvenida y enlace para cerrar sesión --}}
    <div class="d-flex justify-content-between">
        <a class="text-start fs-4 text-dark">Bienvenid@  <b> {{ auth()->user()->name }} </b> </a>
        <div class="text-end">
            <a class="btn btn-danger" href="{{ route('login.destroy') }}">Cerrar sesión</a>
        </div>
    </div>
    

    @else
    {{-- Mostrar enlace de inicio para usuarios no autenticados --}}
    <div class="d-flex justify-content-between align-items-center">
        <p><a class="btn text-white mt-2 mt-md-0" href="{{route('registroreg')}}" style="background-color: #2d5135;">Inicio</a></p>
        <h1 class="container fs-4 fw-bold text-center">Iniciar sesión</h1>
    </div>
    @endif

    {{-- Renderizar el contenido específico de cada vista --}}
    @yield('content')
</body>
</html>
