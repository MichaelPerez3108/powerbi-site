<x-app-layout>
    <x-slot name='title'>
        Bienvenido | Principal
    </x-slot>


    <button x-on:click="openComents = !openComents" hidden>Comentarios</button>
    <button x-on:click="openDoc = !openDoc" hidden>Documentacion</button>

    <!-- Desplegable-->

    <div x-show="open" id="estado" style="position: absolute;" x-transition.origin.left:enter="transition ease-out duration-200" x-transition.origin.left:enter-start="opacity-0 scale-100" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100" class="relative z-50 flex flex-col bg-clip-border bg-redcs text-gray-700 h-[calc(100vh-4.1rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
        <img src="{{ asset('/storage/assets/cusezar.png') }}" height="100" width="150" style="margin: 0 auto;">
        <hr class="bg-amarillocs mt-3" style="color: #fff69b; border:solid 1px;">
        <div class="overflow-y-auto overflow-x-auto max-h-[calc(100vh-9.1rem)]"> <!-- Aquí se establece la altura máxima y el desplazamiento -->
            <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700" id="nav">

            </nav>
        </div>
    </div>



    <!-- SECCION DEL CARRUSEL-->
    <section class="flex justify-center ">
        <div class="bg-blanco w-11/12 h-72 mx-5 my-5 flex justify-evenly overflow-hidden ">
            <h6 class="text-center text-lg font-bold w-full">Elementos destacados</h6>
        </div>
    </section>




    <!-- SECCION DE LOS ELEMENTOS DESTACADOS-->
    <section class="flex justify-center">
        <div class="bg-blanco w-11/12 h-72 mx-5 my-5 flex flex-wrap justify-evenly ">
            <h6 class="text-center text-lg font-bold w-full">Elementos destacados</h6>
            <!-- componente -->
            <div class="flex justify-between items-center p-5">
                <div class="block bg-white w-48 h-52 shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px]">
                    <div class="flex justify-center relative overflow-hidden bg-cover bg-no-repeat my-2" data-te-ripple-init data-te-ripple-color="light">
                        <img class="rounded-lg w-24 h-24" src="/img/report.png" alt="logo de reporte" />
                        <a href="#!"></a>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <!-- titulo de la tarjeta -->
                            <h5 class="mb-2 text-sm font-bold text-neutral-800 text-center">
                                Nombre reporte
                            </h5>
                        </div>
                        <!--descripcion del elemento -->
                        <p class="mb-1 text-sm text-neutral-600 dark:text-neutral-200 text-center">
                            area del reporte
                        </p>
                    </div>
                </div>
            </div>


            <div class="flex justify-between items-center p-5">
                <div class="block bg-white w-48 h-52 shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px]">
                    <div class="flex justify-center relative overflow-hidden bg-cover bg-no-repeat my-2" data-te-ripple-init data-te-ripple-color="light">
                        <img class="rounded-lg w-24 h-24" src="/img/report.png" alt="" />
                        <a href="#!"></a>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <!-- titulo de la tarjeta -->
                            <h5 class="mb-2 text-sm font-bold text-neutral-800 text-center">
                                Nombre reporte
                            </h5>
                        </div>
                        <!--descripcion del elemento -->
                        <p class="mb-1 text-sm text-neutral-600 dark:text-neutral-200 text-center">
                            area del reporte
                        </p>
                    </div>
                </div>
            </div>



            <div class="flex justify-between items-center p-5">
                <div class="block bg-white w-48 h-52 shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px]">
                    <div class="flex justify-center relative overflow-hidden bg-cover bg-no-repeat my-2" data-te-ripple-init data-te-ripple-color="light">
                        <img class="rounded-lg w-24 h-24" src="/img/report.png" alt="" />
                        <a href="#!"></a>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <!-- titulo de la tarjeta -->
                            <h5 class="mb-2 text-sm font-bold text-neutral-800 text-center">
                                Nombre reporte
                            </h5>
                        </div>
                        <!--descripcion del elemento -->
                        <p class="mb-1 text-sm text-neutral-600 dark:text-neutral-200 text-center">
                            area del reporte
                        </p>
                    </div>
                </div>
            </div>



            <div class="flex justify-between items-center p-5">
                <div class="block bg-white w-48 h-52 shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px]">
                    <div class="flex justify-center relative overflow-hidden bg-cover bg-no-repeat my-2" data-te-ripple-init data-te-ripple-color="light">
                        <img class="rounded-lg w-24 h-24 " src="/img/report.png" alt="" />
                        <a href="#!"></a>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <!-- titulo de la tarjeta -->
                            <h5 class="mb-2 text-sm font-bold text-neutral-800 text-center">
                                Nombre reporte
                            </h5>
                        </div>
                        <!--descripcion del elemento -->
                        <p class="mb-1 text-sm text-neutral-600 dark:text-neutral-200 text-center">
                            area del reporte
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </section>
</x-app-layout>