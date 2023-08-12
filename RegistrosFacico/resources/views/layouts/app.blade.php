<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/jquery-3.3.1.js') }}"></script>
    <link href="{{ asset('js/bootstrap.min.css') }}" rel="stylesheet" href="">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logouaem.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('fonts/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <title>UAEMex</title>
    <style>
        /* Estilos globales */
        body, html {
            height: 100%;
            min-height: 100%;
        }
        
        body {
            display: flex;
            flex-direction: column;
        }

        /* Estilos para el footer */
        .footer-content {
            background-color: #2d5135;
            padding: 20px;
        }

        /* Estilos para la línea divisora */
        .linea {
            background-color: #9b8322;
            height: 0.10cm;
            width: 100%;
        }

        /* Estilos para el formulario de registro */
        .registro {
            /* margin: 0.0mm; */
        }

        /* Estilos para el autoajuste de textarea de quejas y sugerencias */
        .textarea {
            resize: none;
            overflow: hidden;
        }
    </style>
</head>
<body>

<!-- Cuerpo del documento -->

</body>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.3.1.js') }}"></script>

{{-- Auto ajuste cuadro quejas y sugerencias  --}}
<script>
    // Script para ajustar la altura del textarea según el contenido
    const textarea = document.getElementById('quejas_sugerencias');
  
    textarea.addEventListener('input', () => {
        textarea.style.height = 'auto'; // Reiniciar la altura del textarea
        textarea.style.height = textarea.scrollHeight + 'px'; // Ajustar la altura según el contenido
    });
</script>

<!-- Auto recarga de página después de enviar el formulario -->
<script>
    window.onload = function () {
        // Recarga la página después de un tiempo (3000 ms = 3 segundos)
        setTimeout(function(){
            location.reload();
        }, 3000);
    }
</script>

<!-- Cuadro de captura No. eq. computo -->
<script>
    // Mostrar o ocultar el cuadro de texto según la opción seleccionada
    const opcionesSelect = document.getElementById('servicio');
    const cuadroTextoDiv = document.getElementById('n equipo');
  
    opcionesSelect.addEventListener('change', function () {
        const opcionSeleccionada = opcionesSelect.value;
        if (opcionSeleccionada === 'Equipo de Cómputo') {
            cuadroTextoDiv.style.display = 'block';
        } else {
            cuadroTextoDiv.style.display = 'none';
        }
    });
</script>

<!-- Validación solo números -->
<script>
    function validateNumber(event) {
        const input = event.target;
        const value = input.value.trim();

        // Verificar si el valor ingresado es un número
        if (isNaN(value)) {
            document.getElementById("errorMessage").style.display = "inline";
            input.value = value.replace(/[^0-9]/g, ""); // Eliminar caracteres no numéricos
        } else {
            document.getElementById("errorMessage").style.display = "none";
        }
    }
</script>

{{-- Cerrar Modal --}}
<script>
    document.getElementById('closeFilterModal').addEventListener('click', function () {
        $('#filterModal').modal('hide');
    });
</script>

</html>
