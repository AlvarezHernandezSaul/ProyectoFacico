@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FaCiCo</title>
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

<div class="linea"> </div>
@include('layouts.checking')
<div class="linea"></div>
<br><br>

<div class="container-fluid">
    
    <div>
    <center>
    <h2>Registros de uso de salas de computo FaCiCo</h2>
    </center>
    </div>
    <br><br>
    <!-- tabla -->
    <table class="table table-borderless ">
        	<thead>
            		<tr>
                		<th>Id</th>
                		<th>Nombre</th>
                		<th>No. de Cuenta</th>
                		<th>Servicio</th>
                		<th>no de equipo</th>
                		<th>Licenciatura</th>
                		<th>Usuario</th>
                		<th>Queja o sujerencia</th>
                		
            		</tr>
        	</thead>
        	<tbody>
            	@foreach( $registro as $reg)
            		<tr>
                		<td>{{ $reg->id }}</td>
                		<td>{{ $reg->nombre }}</td>
                		<td>{{ $reg->cuenta }}</td>
                		<td>{{ $reg->servicio }}</td>
                		<td>{{ $reg->numero_equipo }}</td>
                		<td>{{ $reg->licenciaturas}}</td>
                		<td>{{ $reg->usuario}}</td>
                		<td>{{ $reg->quejas_sugerencias}}</td>

            		</tr>
                @endforeach
        	</tbody>
	</table>
    <!-- tabla -->
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