<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Tickets Térmicos</title>
    <style>
    @page {
        size: 6.3cm 15.3cm; /* Tamaño del ticket */
        margin: 0; /* Sin márgenes */
    }
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    #ticket-container {
        width: 6.3cm; /* Ancho del ticket */
        height: 15.3cm; /* Alto total del ticket */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        page-break-inside: avoid;
    }
    .ticket {
        width: 100%; /* Ocupa todo el ancho del contenedor */
        height: 100%; /* Ocupa todo el alto del ticket */
        background-image: url('data:image/png;base64,{{ $imagen }}');; /* Fondo del ticket */
        background-size: cover; /* La imagen ocupa todo el fondo */
        background-repeat: no-repeat; /* Sin repetición */
        background-position: center; /* Centrar la imagen */
        transform: rotate(180deg); /* Gira el contenido 180 grados */
        transform-origin: center; /* Punto de rotación en el centro */
        page-break-inside: avoid;
    }
    .codo, .cuerpo {
        text-align: center;
        padding: 0.1cm;
        box-sizing: border-box;
        font-size: 12px;
    }
    .codo {
        height: 5cm; /* Altura del codo */
        text-align: right;
        padding: 3.8cm 0.6cm 0;
        box-sizing: border-box;
        font-size: 13px;
        font-weight: bold;
    }
    .cuerpo {
        height: 10.3cm; /* Altura del cuerpo */
        text-align: center;
        padding: 9.2cm 0.6cm 0;
        box-sizing: border-box;
        font-size: 13px;
        font-weight: bold
    }
</style>
</head>
<body>
    <div id="ticket-container">
        @foreach ($tickets as $ticket)
            <div class="ticket">
                <!-- Bloque del Codo -->
                <div class="codo">
                    <p>No. {{sprintf('%04d', $ticket)}}</p>
                </div>
                <!-- Bloque del Cuerpo -->
                <div class="cuerpo">
                    <p>No. {{sprintf('%04d', $ticket)}}</p>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
