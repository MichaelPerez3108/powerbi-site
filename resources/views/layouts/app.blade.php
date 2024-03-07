<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c580716ab2.js" crossorigin="anonymous" defer></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        /* Agregar estilo para ajustar el contenido principal cuando el menú está desplegado */
        .main-content {
            margin-left: 450px;
            /* Ajusta este valor según tus necesidades */
            transition: margin-left 0.2s ease;
            /* Agrega una transición suave */
        }

        [x-show="open"]+.main-content {
            margin-left: 150px;
            /* Ajusta este valor según el ancho de tu menú desplegable */
        }
    </style>
</head>

<body class="bg-grisfondo"  x-data="{ open: false, openComents : false }" @click.away="open = false; openDoc = false; openComents = false">

    @include('layouts.navigation')

    <main>
        {{ $slot }}
    </main>

</body>

</html>