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
<div>
<div class="linea"> </div>
@include('layouts.checking')
<div class="linea"></div>
<br>
</div>


<div class="container">

    <div class="d-flex align-items-center justify-content-between">
        <div class="text-center">
            <h2>Registros de uso de salas de cómputo FaCiCo</h2>
        </div>
    <div>
        <div style="display: flex; align-items: center;">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <a href="{{ route('report.generate') }}" title="Generar Excel" style="text-align: center; margin-left: 0.5cm;">
                    <i class="fa-solid fa-file-excel fa-3x" style="color: #0b5014;"></i>
                </a>
                <p style="margin-top: 0; font-size: 0.5cm; font-weight: bold;">Generar Excel</p>
            </div>
        </div>
        
    </div>  
    </div>
    
    
    <br><br>
    <!-- tabla -->
    <table class="table table-bordered border-dark" >
        	<thead>
            		<tr style='background-color: #b9b8b8; '>
                		<th>Nombre</th>
                		<th>No. de cuenta</th>
                		<th>Servicio</th>
                		<th>No. de equipo</th>
                		<th>Licenciatura</th>
                		<th>Usuario</th>
                		<th>Queja o sugerencia</th>
                		
            		</tr>
        	</thead>
        	<tbody>
            	@foreach( $registro as $reg)
            		<tr>
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