<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Tickets Térmicos</title>
    <link rel="stylesheet" href="{{asset('two-part-style.css')}}">
    <style>
        .ticket{
            background-image: url('data:image/png;base64,{{ $imagen }}');; /* Fondo del ticket */
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
