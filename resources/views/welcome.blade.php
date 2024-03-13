<x-app-layout>
    <x-slot name='title'>
        Bienvenido | Principal
    </x-slot>


    <button x-on:click="openComents = !openComents" hidden>Comentarios</button>
    <button x-on:click="openDoc = !openDoc" hidden>Documentacion</button>

    
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