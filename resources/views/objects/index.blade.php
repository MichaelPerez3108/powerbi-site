@props([
'objeto' => null,
])

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista principal | main</title>
    <link rel="stylesheet" href="/css/style.css">
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

<body class="bg-grisfondo" x-data="{ open: false, openDoc: false }" @click.away="open = false; openDoc = false">
    <!-- BARRA DE NAVEGACION-->
    <div x-data="{openComents:false}" @click.away="openComents = false" class="">
    @include('layouts.navigation')


        <!-- Fin barra de navegacion-->

        <!-- Menu lateral de carpetas desplegable-->
        <div x-show="open" id="estado" style="position: absolute;" x-transition.origin.left:enter="transition ease-out duration-200" x-transition.origin.left:enter-start="opacity-0 scale-100" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100" class="relative flex flex-col bg-clip-border  bg-redcs text-gray-700 h-[calc(100vh-4.1rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
        <img src="{{asset('/storage/assets/cusezar.png')}}" height="100" width="150" style="margin: 0 auto;">
            <hr class="bg-amarillocs mt-3" style="color: #fff69b; border:solid 1px;">
            <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">
                @foreach($objetos as $objeto)
                <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start text-blanco leading-tight transition-all hover:bg-rojoactivo hover:bg-opacity-80 focus:bg-rojoactivo focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                
                    <div class="flex place-items-center mr-4">
                        <svg class="mr-1 h-3 w-3 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="16" />
                            <line x1="8" y1="12" x2="16" y2="12" />
                        </svg>
                        @if(($objeto?->type == App\Enums\ObjetoType::Folder))
                        <svg class="h-6 w-6 text-amarillocs" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                        </svg>
                        @else
                        <i class="fa-solid fa-chart-column fa-lg" style="color: #fff69b;"></i>
                        @endif
                    </div>
                    {{$objeto->name}}
                </div>
                @endforeach
            </nav>
        </div>

        <!--menu desplegable de comentarios -->


        <!--Cierre del menu de comentarios lateral-->

        <!--MENU DE APERTURA DE DOCUMENTACION DE  -->

        <div x-show="openDoc" style="position: absolute; right: 0;" x-transition.origin.left:enter="transition ease-out duration-200" x-transition.origin.left:enter-start="opacity-0 scale-100" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100" class="relative flex flex-col bg-clip-border  bg-blanco text-gray-700 h-[calc(100vh-4.1rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">

            <p>Documentación de: <strong>Objeto</strong></p>
            <hr class="mt-3" style="color: #000000; border:solid 1px;">
            <div class="flex flex-col gap-1 h-4/5 ">
                <div class="">
                    <!-- Encabezado de documentación -->
                    <p class="inline text-sm">Autor: "</p><strong class="font-sm">Nombre del autor"</strong><br>
                    <p class="inline text-sm">Fecha de creación: "</p><strong class="font-sm">Fecha de creación del reporte"</strong><br>
                    <p class="inline text-sm"># Visitas: "</p><strong class="font-sm">1251"</strong>
                    <hr class="mt-3" style="color: #000000; border:solid 1px;">
                </div>
                <div class=" flex justify-between my-2">
                    <h6 class="text-negro font-medium">Contenido</h6>
                    <a href="" class="mx-3 underline underline-offset-4 text-azulLink">Editar</a>
                </div>

                <div class="flex text-center align-center justify-center overflow-auto">
                    <p class="text-center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti alias ad obcaecati consequuntur sapiente, itaque eveniet vitae qui quam exercitationem velit, blanditiis provident! Saepe, laborum exercitationem totam aperiam cupiditate alias! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo officiis id asperiores rem esse. Ipsam, modi incidunt quae laborum quibusdam, fuga velit deserunt eos ut non ea, minus alias officia! Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis nostrum ut eligendi ipsa harum cupiditate praesentium aut corporis! Libero expedita voluptatum facilis aperiam natus iste officia nemo voluptates temporibus molestiae.
                    </p>
                </div>
            </div>
            <!-- Contenido de la documentación -->

            <div class="absolute bottom-4 left-4">
                <button x-on:click="openDoc = !openDoc" class="align-center ">
                    <svg class="h-8 w-8 text-slate-900 inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M7 12h14l-3 -3m0 6l3 -3" />
                    </svg>
                    Cerrar
                </button>
            </div>
        </div>




        <!--Tabla de estructura de carpetas-->
        <div class="container mx-auto overflow-hidden flex justify-between align-center w-4/5">
            <nav class="text-black font-bold my-8 align-center" aria-label="Breadcrumb">
                <p class="inline text-negroclarito text-sm mr-2"> Directorio: </p>
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="#">Home</a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                    </li>
                </ol>
            </nav>


<!--
            <button x-on:click="openComents = ! openComents">Comentarios</button>
            <button x-on:click="openDoc = ! openDoc">Documentacion</button>
    -->

            <div class="flex items-center justify-center ">
                <div x-data="{ showModal: false, email: '' }">
                    <!-- Button de abrir modal -->
                    <a href="{{ url('objects/create') }}"> <button class="bg-white border p-2 rounded-lg hover:bg-grisoscuro hover:shadow-lg"><i class="fa-solid fa-plus mr-2"></i>Nuevo objeto</button></a>
                </div>
            </div>


            <!--Modal-->

        </div>
    </div>

    <!-- componente alpinejs para modal -->



    <div class="container mx-auto bg-blanco rounded-3xl overflow-auto h-96 w-4/5">
        <div class="">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-blanco border-b">
                    <tr>
                        <th scope="col" class="  ">
                        </th>
                        <th scope="col" class="inline pr-2 text-sm font-medium text-gray-900">
                            Nombre
                        </th>
                        <th scope="col" class="pr-2 py-3 text-sm font-medium text-gray-900 text-start">
                            Tipo
                        </th>
                        <th scope="col" class="pr-2 py-3 text-sm font-medium text-gray-900 text-start">
                            Fecha de creacion
                        </th>
                        <th scope="col" class="pr-2 py-3 text-sm font-medium text-gray-900 text-start">
                            Fecha de modificación
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($objetos as $objeto)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="pl-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            @if($objeto->type == App\Enums\ObjetoType::Folder)
                            <i class="fa-solid fa-folder-open fa-2xl" style="color: #000000;"></i>
                            @else
                            <i class="fa-solid fa-chart-column fa-2xl" style="color: #000000;"></i>
                            @endif
                        </td>
                        <td class="pr-2 py-4 whitespace-nowrap text-sm text-gray-900">
                        <a href="{{ route('objects.show', ['objeto' => $objeto->id]) }}">{{ $objeto->name }}</a>
                        </td>
                        <td class="pr-2 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{$objeto->type}}
                        </td>
                        <td class="pr-2 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{$objeto->created_at}}
                        </td>
                        <td class="pr-2 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{$objeto->updated_at}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>