@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
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
@include('layouts.checking')

<div>
    <div class="linea"></div>
</div>
<div class="container col-md-5 border-1 rounded-3">
  <form class="row g-1" method="POST" >
    @csrf

    <div class="col-md-8 offset-md-2 border-dark"> 
        <label for="email" class="form-label fw-bold">Email </label>
        <input type="email" class="form-control border-dark" placeholder="ingrese su correo electronico" id="email" name="email">
    </div>
    <div class="col-md-8 offset-md-2">
        <label for="password" class="form-label fw-bold">Contraseña</label>
        <input type="password" class="form-control border-dark" id="password" name="password" placeholder="contraseña de 8 digitos">
    </div>
    @error('message')
    <p class="border border-danger rounded-3 bg-danger col-md-8 offset-md-2"> *Error, correo y/o contraseña incorrectos</p>
    @enderror 

    <div class="col-md-6 offset-md-3 my-3">
        <button class="btn text-light w-100" style="background-color: #2d5135;" type="submit">Entrar</button>
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