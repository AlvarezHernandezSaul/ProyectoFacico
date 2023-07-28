@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <header class="header-desktop" style="background-color: #2d5135; width: 100%; padding: 0;">
        <nav class="container-fluid" style="padding: 0;">
            <center>
                <img src="{{ asset('img/logouaem.png') }}" alt="uaem">
            </center>
        </nav>
    </header>
          <div>
            <div class="linea"></div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <p><a class="btn text-white mt-2 mt-md-0" href="{{route('login.index')}}" style="background-color: #2d5135;">Atras</a></p>

                <h1 class="container fs-4 fw-bold text-center">Registrate</h1>

            </div>
              <div>
                <div class="linea"></div>
                </div>
     <div class="container col-md-5 border-1 rounded-3">
    <form class="row g-1 container" method="POST" action="">
        @csrf
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <label for="Nombre" class="form-label fw-bold">Nombre de usuario</label>
                <input type="name" class="form-control border-dark" placeholder="Ingrese su nombre completo" id="name" name="name">
                @error('name')
                <p class="border border-danger rounded-3 bg-danger">Error, nombre requerido</p>
                @enderror
            </div>
        
            <div class="row">
                <label for="Email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control border-dark" placeholder="Ingrese su correo electrónico" id="email" name="email">
                @error('email')
                <p class="border border-danger rounded-3 bg-danger">Error, email requerido</p>
                @enderror
            </div>
        
            <div class="row">
                <label for="password" class="form-label fw-bold">Contraseña</label>
                <input type="password" class="form-control border-dark" id="password" name="password" placeholder="Contraseña de 8 dígitos">
                @error('password')
                <p class="border border-danger rounded-3 bg-danger">Error, contraseña requerida</p>
                @enderror
            </div>
        
            <div class="row">
                <label for="password" class="form-label fw-bold">Confirme su contraseña</label>
                <input type="password" class="form-control border-dark" id="password" name="password_confirmation"  placeholder="Ingrese de nuevo su contraseña">
                @error('password')
                <p class="border border-danger rounded-3 bg-danger">Error, las contraseñas no coinciden</p>
                @enderror
            </div>
        </div>
        
      
        <div>
            <button class="btn col-md-6 my-3 offset-md-3 text-light fw-bold" style="background-color: #2d5135;" type="submit">Registrarse</button>
        </div>
          
    </form>
</div>

  
       <!-- footer -->
<footer class="mt-auto">
    <div class="row">
        <div class="col-md-12">
            <div class="footer-content" style="background-color: #2d5135;">
                <center>
                    <img src="{{ asset('img/logofacico.png') }}" alt="uaem" width="316px" height="97px">
                </center>
            </div>
        </div>
    </div>
  </footer>
  <!-- end footer -->
</body>
</html>