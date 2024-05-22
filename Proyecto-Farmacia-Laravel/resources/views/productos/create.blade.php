@extends('layouts.app')

@section('content')
<div class="ml-64 p-6"> <!-- ml-64 to offset the sidebar width -->
    <div class="w-3/4 mx-auto lg:mx-0"> <!-- Centrear -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Formulario para agregar productos</h2>

            <form action="{{ route('productos.store') }}" method="post" id="form-registro" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="fotografia" class="block text-gray-700 font-bold mb-2">Fotografia:</label>
                    <input type="file" name="fotografia" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Agrega la etiqueta img aquí para mostrar la imagen -->
                <div class="mb-4">
                </div>
                
                <!-- Resto del formulario -->
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre producto:</label>
                    <input type="text" name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <input type="text" name="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-gray-700 font-bold mb-2">Precio:</label>
                    <input type="number" name="precio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-gray-700 font-bold mb-2">Stock:</label>
                    <input type="number" name="stock" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="fecha_de_vencimiento" class="block text-gray-700 font-bold mb-2">Fecha de vencimiento:</label>
                    <input type="date" name="fecha_de_vencimiento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="lote" class="block text-gray-700 font-bold mb-2">Lote:</label>
                    <input type="text" name="lote" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 rounded-full focus:outline-none focus:shadow-outline">Registrar</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
