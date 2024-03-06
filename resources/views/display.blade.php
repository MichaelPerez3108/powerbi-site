@props([
'objeto' => null
])

<x-app-layout>
    <x-slot name='title'>
        Display reporte
    </x-slot>



    @if($objeto?->type == App\Enums\ObjetoType::Folder->value)
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



        <button x-on:click="openComents = ! openComents">Comentarios</button>
        <button x-on:click="openDoc = ! openDoc">Documentacion</button>


        <div class="flex items-center justify-center ">
            <div x-data="{ showModal: false, email: '' }">
                <!-- Button de abrir modal -->
                <button @click="showModal = true" class="bg-white border p-2 rounded-lg hover:bg-grisoscuro hover:shadow-lg"><i class="fa-solid fa-plus mr-2"></i>Nuevo</button>


                <!-- Modal -->
                <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Modal panel -->
                        <div class="w-full inline-block align-bottom bg-blanco rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <div class="bg-blanco px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <!-- Modal content -->
                                <div class="sm:flex sm:items-start">

                                    <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900  text-center" id="modal-headline"> Agregar nuevo objeto </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500"> Falta implementar formulario de nuevo elemento </p>
                                            <!-- formulario -->
                                            <input type="email" x-model="email" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-500" placeholder="Ejemplo de formulario">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                                <button @click="subscribeToNewsletter" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-success text-base font-medium text-blanco hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"> Guardar </button>

                                <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-redcs text-base font-medium text-blanco hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> Cancelar </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @else
    <div class="container relative mx-auto bg-blanco overflow-hidden h-[800px] w-3/5 flex flex-col mt-20 p-2 z-0">

        <iframe src="" frameborder="" id="frame" class="h-4/5 w-full bg-grisfondo static z-0 static">

        </iframe>

        <div class="z-50 h-16 justify-between py-1 absolute top-0 right-0 mt-4 mr-4">

            <button @click="resize"><i class="fa-solid fa-expand fa-xl inline mr-3"></i></button>
            
            <script>
                const frame = document.getElementById('frame');

                function resize() {


                    if (!document.fullscreenElement) {
                        frame.requestFullscreen().catch(err => {
                            alert(`Error al intentar entrar en modo pantalla completa: ${err.message}`);
                        });
                    } else {
                        document.exitFullscreen();
                    }

                    document.addEventListener('fullscreenchange', () => {
                        if (!document.fullscreenElement) {
                            // Realizar acciones cuando se sale del modo de pantalla completa
                        }
                    });
                }
            </script>

            <button x-on:click="openComents = ! openComents"><i class="fa-solid fa-message fa-xl inline mr-3"></i></button>

            <button x-on:click="openDoc = ! openDoc"><i class="fa-solid fa-circle-question fa-xl inline"></i></button>

        </div>
        <hr class="my-1 border-y-2">
        <div class="h-1/5 w-full  flex flex-col p-5">
            <div class="my-1">
                <h3 class="inline">Nombre del reporte: </h3>
                <p class="inline font-bold">{{ $objeto?->name }}</p>
            </div>
            <div class="my-1">
                <h3 class="inline ">Promedio de calificacion: </h3>
                <p class="inline font-bold">3.5</p>
            </div>
            <div class="my-1">
                <h3 class="inline">Vistas totales: </h3>
                <p class="inline font-bold">1250</p>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>