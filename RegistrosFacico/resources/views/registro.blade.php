@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro UAEMex</title>
 
</head>
<body>

<!-- HEADER DESKTOP-->
<header class="header-desktop" style="background-color: #2d5135; width: 100%; padding: 0;">
    <nav class="container-fluid" style="padding: 0;">
        <center>
            <img src="{{ asset('img/logouaem.png') }}" alt="uaem">
        </center>
    </nav>
</header>
<!-- END HEADER DESKTOP-->

<!-- Formulario de Registro -->
<div>
<div class="linea"></div>
</div>
<!-- Encabezado del formulario -->
<div class="d-flex flex-column flex-md-row justify-content-between registro align-items-md-center">
    <p class="container fs-6 fw-bold text-center my-2 my-md-0"> REGISTRO DE SALAS DE CÓMPUTO FaCiCo </p>
    <a class="btn text-white mt-2 mt-md-0" href="{{route('login.index')}}" style="background-color: #2d5135;">Iniciar Sesión</a>
</div>
<div><div class="linea"></div></div>
<br>

<!-- Formulario de registro -->
<form class="container"  method="POST" action="{{ route('guardar.datos') }}">
    @csrf

    <!-- Campos de nombre y número de cuenta -->
    <div class="row">
        <div class="col">
            <label class="form-label fw-bold">Nombre completo</label>
            <input id="nombre" name="nombre" type="text" class="form-control border border-dark" placeholder="Introduzca su nombre completo" aria-label="First name">
        </div>
        <div class="col">
            <label class="form-label fw-bold">Número de cuenta</label>
            <input id="cuenta" name="cuenta" type="text" class="form-control border-dark" placeholder="Introduzca su número de cuenta" aria-label="Last name" oninput="validateNumber(event)">
            <small id="errorMessage" style="color: red; display: none;">Solo se permiten números</small>
        </div>
    </div>
    <br>

    <!-- Campos de servicio, licenciatura y usuario -->
    <div class="row">
        <div class="col-6">
            <label class="form-label fw-bold">Servicios</label>
            <!-- Select para servicios -->
            <select class="form-select border-dark  text-center" id="servicio"  name="servicio" data-bs-display="static">
                <!-- Opciones de servicios -->
                <option selected>Seleccione su servicio solicitado</option>
                <option value="Equipo de Cómputo">Equipo de Cómputo</option>
                <option value="Impresiones">Impresiones</option>
                <option value="Escaneo">Escaneo</option>
            </select>
            
            <!-- Campo adicional para número de equipo (si es necesario) -->
            <div id="n equipo" style="display: none;">
                <br>
                <label for="NumeroEquipo">Ingrese el número de equipo:</label>
                <input style="border-radius: 4px; padding: 5px;" type="text" id="numero_equipo" name="numero_equipo">
            </div>
        </div>
        <div class="col-6">
            <label class="form-label fw-bold">Licenciaturas</label>
            <!-- Select para licenciaturas -->
            <select class="form-select border-dark  text-center" id="licenciaturas" name="licenciaturas" data-bs-display="static">
                <!-- Opciones de licenciaturas -->
                <option selected>Seleccione su licenciatura</option>
                <option value="Psicología">Psicología</option>
                <option value="Educación">Educación</option>
                <option value="Trabajo Social">Trabajo Social</option>
                <option value="Cultura Física y Deporte">Cultura Física y Deporte</option>
                <option value="Externo">Externo</option>
            </select>
        </div>
    </div>
    <br><br>

    <!-- Campos de tipo de usuario y quejas/sugerencias -->
    <div class="row">
        <div class="col-6">
            <label class="form-label fw-bold">Tipos de Usuarios</label>
            <!-- Select para tipos de usuarios -->
            <select class="form-select border-dark  text-center" id="usuario" name="usuario" data-bs-display="static">
                <!-- Opciones de tipos de usuarios -->
                <option selected>Seleccione su tipo de usuario</option>
                <option value="Alumno">Alumno</option>
                <option value="Profesor">Profesor</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Externo">Externo</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label fw-bold">Quejas y sugerencias</label>
            <!-- Área de texto para quejas/sugerencias -->
            <textarea id="quejas_sugerencias" name="quejas_sugerencias" class="form-control border border-dark" placeholder="Si tiene alguna queja o sugerencia introdúzcala aquí" aria-label="With textarea"></textarea>
        </div>
    </div>
    <br><br>

    <!-- Botón de registro que abre un modal -->
    <div class="col-12 text-center">
        <button type="button" class="btn text-light fs-1" style="background-color: #2d5135;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            REGISTRARSE
        </button>
    </div>

    <!-- Modal de registro exitoso -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">REGISTRO EXITOSO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Recuerda que tu registro tiene una duración de 3 horas como máximo para uso de los equipos de cómputo. Para finalizar su registro, presione ACEPTAR. Buen día.
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn text-light" style="background-color: #2d5135;" data-bs-dismiss="modal" onclick="location.reload()">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>
</form>
<br>

<!-- Footer -->
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
<!-- End Footer -->

</body>
</html>
