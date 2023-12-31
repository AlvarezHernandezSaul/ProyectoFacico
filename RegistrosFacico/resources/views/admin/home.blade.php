@extends('layouts.app')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FaCiCo</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS si es necesario -->
</head>
<body>
    <!-- HEADER DESKTOP -->
    <header class="header-desktop" style="background-color: #2d5135; width: 100%; padding: 0;">
        <nav class="container-fluid" style="padding: 0;">
            <center>
                <img src="{{ asset('img/logouaem.png') }}" alt="uaem">
            </center>
        </nav>
    </header>
    <!-- END HEADER DESKTOP -->
    
    <div>
        <div class="linea"> </div>
        @include('layouts.checking')
        <div class="linea"></div>
        <br>
        <div style="display: flex; align-items: center;" class="container">
            <a class="btn text-white " href="{{ route('register.index') }}" style="background-color: #03a70a;">
                <i class="fa-solid fa-user-plus" style="font-size: 24px;"></i>
                <p class="mt-0 mb-0 fw-bold ml-2">Agregar usuario</p>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="text-center">
                <h2>Registros de uso de salas de cómputo FaCiCo</h2>
            </div>
            <div>
                <div style="display: flex; align-items: center;">
                    <!-- Botón para abrir el modal de filtrado -->
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <a href="#" title="Generar Excel" style="text-align: center; margin-left: 0.5cm;" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <!-- Icono de Excel -->
                            <i class="fa-solid fa-file-excel fa-3x" style="color: #0b5014;" data-bs-toggle="modal" data-bs-target="#filterModal"></i>
                        </a>    
                        <p style="margin-top: 0; font-size: 0.5cm; font-weight: bold;">Generar Excel</p>
                    </div>
                    <!-- Modal de filtrado -->
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  role="document">
                            <div class="modal-content text-center">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="filterModalLabel">Filtrar Reporte</h5>
                                    <button type="button" id="closeFilterModal" class="btn-close" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="filterForm" method="POST" action="{{ route('report.generate') }}">
                                        @csrf
                                        <br>
                                        <div>
                                            <p>Considere que este software se empleó a partir de Agosto 2023</p>
                                            <label for="year">Año:</label>
                                            <input type="number" id="year" name="year" min="2023" max="2099" step="1" required>
                                            <label for="semester">Semestre:</label>
                                            <select id="semester" name="semester" required>
                                                <option value="A-Febrero a Julio">A-Febrero a Julio</option>
                                                <option value="B-Agosto a Enero">B-Agosto a Enero</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn text-white" id="filterSubmit" style="background-color: #03a70a;" >Generar Reporte</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <!-- tabla -->
        <table class="table table-bordered border-dark">
            <thead>
                <tr style='background-color: #b9b8b8; '>
                    <th></th>
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
                        <td>
                            <form action="{{ route('destroy', $reg->id) }}" class="d-inline formulario-eliminar" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-6"><i class="fa fa-trash me-2"></i></button>
                            </form>
                        </td>
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
    <footer class="footer mt-auto" style="background-color: #2d5135; width: 100%;">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-content">
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