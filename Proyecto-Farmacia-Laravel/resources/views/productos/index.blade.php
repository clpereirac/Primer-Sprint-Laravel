<!-- resources/views/productos/index.blade.php -->
@extends('layouts.app')

@section('title', 'Listado de Productos de farmacia')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Lista de Productos</h1>

<div class="mb-4">
    <form action="{{ route('productos.index') }}" method="GET" class="flex items-center">
        <input 
            type="text" 
            name="buscar" 
            id="nombre_producto" 
            placeholder="Buscar producto" 
            value="{{ request('buscar') }}" 
            class="border rounded p-2 w-full"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Buscar</button>
    </form>
</div>

@if($productos->count() > 0)
<div class="bg-white shadow-md rounded my-6 overflow-x-auto">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Fotografía</th>
                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Descripción</th>
                <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Precio</th>
                <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Stock</th>
                <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Lote</th>
                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Operaciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($productos as $producto)
            <tr>
                <td class="w-1/12 text-left py-3 px-4">{{ $producto->id }}</td>
                <td class="w-1/6 text-left py-3 px-4">{{ $producto->nombre }}</td>
                <td class="w-1/6 text-left py-3 px-4">
                    <img src="{{ asset('img/' . $producto->fotografia) }}" alt="img" width="80px">
                </td>
                <td class="w-1/6 text-left py-3 px-4">{{ $producto->descripcion }}</td>
                <td class="w-1/12 text-left py-3 px-4">{{ $producto->precio }}</td>
                <td class="w-1/12 text-left py-3 px-4">{{ $producto->stock }}</td>
                <td class="w-1/12 text-left py-3 px-4">{{ $producto->lote }}</td>
                <td class="w-1/6 text-left py-3 px-4 flex space-x-2">
                    <a href="{{ route('productos.edit', $producto->id) }}">
                        <button class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
                    </a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p class="text-red-500">No existen registros que mostrar</p>
@endif
@endsection
