<x-app-layout>
    <x-slot name='title'>
        Crear Objeto
    </x-slot>
    

    <div x-data="{ type: '', showName: true, showContent: false }" class="flex justify-center my-10">
        <div class="container flex  flex-col text-center align-content-center rounded-xl bg-blanco" style="width: 500px; display:flex; align-items:center;justify-content:center;">
            <div class="my-8">
                <h1 class="font-bold text-center text-2xl">Formulario de objetos</h1>
                <hr>
            </div>
            <form method="POST" action="{{ route('objects.store') }}" class="w-96">
                @csrf
                <label class="block text-gray-700 text-sm font-bold my-2" for="parent">
                    Carpeta donde se guardara
                </label>
                <select name="parent" id="parent" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-500">
                    <option value="" selected>Carpeta raiz</option>
                    @foreach($carpetas as $carpeta)
                    <option value="{{ $carpeta->id }}">{{ $carpeta->name }}</option>
                    @endforeach
                </select>
                <label class="block text-gray-700 text-sm font-bold my-2" for="name">
                    Nombre del objeto
                </label>
                <input type="text" name="name" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-500" placeholder="Nombre del objeto" required x-model="name">

                <label class="block text-gray-700 text-sm font-bold my-2" for="type">
                    Tipo de objeto
                </label>
                <select name="type" id="type" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-500" required x-model="type" @change="showContent = type !== 'folder'">
                    <option value="" selected>Tipo de objeto</option>
                    <option value="folder">Carpeta</option>
                    <option value="report">Reporte</option>
                </select>

                <label class="block text-gray-700 text-sm font-bold my-2" for="url" x-show="type === 'report'">
                    URL del frame PowerBI
                </label>
                <input type="text" name="content" x-show="type === 'report'" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-500" placeholder="URL de Power-BI" x-model="url">

                <button type="submit" class="bg-success text-blanco font-bold rounded-md py-2 px-3 m-4">Guardar</button>
                <a href="{{route('objects.index')}}"><button type="button" class="bg-red text-blanco font-bold rounded-md py-2 px-3 m-4">Cancelar</button></a>
            </form>
        </div>
    </div>
</x-app-layout>


