@extends('layouts.app')

@section('content')
<div class="lotes">
    <h2>Catalogo</h2>

    <div class="lotes-riesgo">
        <div class="titulo-lote">
            <p>Lotes en riesgo</p>
        </div>

        <table class="w-full">
            <tr>
                <th class="bg-gray-200">Codigo</th>
                <th class="bg-gray-200">Producto</th>
                <th class="bg-gray-200">Stock</th>
                <th class="bg-gray-200">Lote</th>
                <th class="bg-gray-200">Fecha de vencimiento</th>
                <th class="bg-gray-200">Opciones</th>
            </tr>
            @foreach($productos as $producto)
                @php
                    $vigente = ($producto->fecha_de_vencimiento >= now()->format('Y-m-d') && $producto->fecha_de_vencimiento <= now()->addDays(10)->format('Y-m-d')) ? 'bg-green-200' : '';
                    $vencido = ($producto->fecha_de_vencimiento < now()->format('Y-m-d')) ? 'bg-red-200' : '';
                @endphp
                <tr>
                    <td class="{{ $vencido }} {{ $vigente }}">{{ $producto->id_lote }}</td>
                    <td class="{{ $vencido }} {{ $vigente }}">
                        <img src="{{ asset('storage/img/' . $producto->fotografia) }}" alt="img" width="60px">
                        <p>{{ $producto->nombre }}</p>
                    </td>
                    <td class="{{ $vencido }} {{ $vigente }}">{{ $producto->stock }}</td>
                    <td class="{{ $vencido }} {{ $vigente }}">{{ $producto->lote }}</td>
                    <td class="{{ $vencido }} {{ $vigente }}">{{ $producto->fecha_de_vencimiento }}</td>
                    <td class="{{ $vencido }} {{ $vigente }}">
                        <form action="{{ route('lotes.destroy', $producto->id_lote) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn_desechar">Desechar</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </table>
    </div>
</div>
@endsection
