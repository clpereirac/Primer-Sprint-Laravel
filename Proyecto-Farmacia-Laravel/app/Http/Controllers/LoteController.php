<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Carbon;

class LoteController extends Controller
{
    public function index()
    {
        $productos = Producto::leftJoin('lotes', 'productos.id', '=', 'lotes.producto_id')
            ->select(
                'productos.id as id_lote',
                'productos.nombre',
                'productos.fotografia',
                'productos.stock',
                'productos.lote',
                'productos.fecha_de_vencimiento'
            )
            ->get()
            ->map(function ($producto) {
                $vigente = ($producto->fecha_de_vencimiento >= Carbon::now()->format('Y-m-d') && $producto->fecha_vencimiento <= Carbon::now()->addDays(10)->format('Y-m-d')) ? 'por-vencer' : '';
                $vencido = ($producto->fecha_de_vencimiento < Carbon::now()->format('Y-m-d')) ? 'vencido' : '';

                return $producto->setAttribute('vigente', $vigente)->setAttribute('vencido', $vencido);
            });

        return view('lotes.index', compact('productos'));
    }
    public function destroy($id)
{
    // Encuentra el producto por su ID y elimínalo
    Producto::destroy($id);

    // Redirige de vuelta a la página de lotes después de eliminar el producto
    return redirect()->route('lotes.index')->with('success', 'Producto eliminado exitosamente');
}

}
