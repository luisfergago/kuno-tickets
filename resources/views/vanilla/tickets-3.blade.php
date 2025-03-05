<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Tickets en Landscape</title>
    <link rel="stylesheet" href="{{asset('three-part-style.css?v=').time()}}">
    <style>
        @import url('https://fonts.cdnfonts.com/css/telegraf');
        .ticket{
            background-image: url('data:image/png;base64,{{ $imagen }}');; /* Fondo del ticket */
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        @foreach ($tickets as $ticket)
            <div class="ticket">
                <!-- Bloque Inicial -->
                <div class="bloque bloque-inicial">
                    <p>TICKET {{sprintf('%03d', $ticket)}}</p>
                </div>
                <!-- Bloque Central -->
                <div class="bloque bloque-central">
                    
                </div>
                <!-- Bloque Final -->
                <div class="bloque bloque-final">
                    <p>TICKET {{sprintf('%03d', $ticket)}}</p>
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
