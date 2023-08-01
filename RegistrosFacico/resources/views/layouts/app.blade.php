<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/jquery-3.3.1.js') }} "> </script>
    <link href="{{ asset('js/bootstrap.min.css') }}" rel="stylesheet" href="">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logouaem.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('fonts/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    

    <title>UAEMex</title>
    <style>
        body, html {
            height: 100%;
            min-height: 100%;
        }
        
        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

        .footer-content {
            background-color: #2d5135;
            padding: 20px;
        }
        .linea {
            background-color: #9b8322;
            height: 0.10cm;
            width: 100%;
        }
        .registro {
            /* margin: 0.0mm; */
        }
        .textarea {
  resize: none; /* Evita que el usuario pueda redimensionar el textarea manualmente */
  overflow: hidden; /* Oculta el contenido que se desborda */
}
   

    </style>
</head>
<body>

    





</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.3.1.js') }}"></script>
{{-- Auto ajuste cuadro quejas y sugerencias  --}}
<script>
    const textarea = document.getElementById('quejas_sugerencias');
  
    textarea.addEventListener('input', () => {
      // Reiniciar la altura del textarea para obtener la altura de contenido real
      textarea.style.height = 'auto';
      
      // Ajustar la altura del textarea según el contenido
      textarea.style.height = textarea.scrollHeight + 'px';
    });
  </script>
  {{-- Auto recarga de pagina despues de dar enviar --}}

<!-- Cuadro captura No. eq. computo -->
<script> 
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
<!-- validacion solo numeros  -->
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

</html>