<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Lote;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{
    public function index(Request $request)
    {
        // Recuperar el valor de búsqueda si existe
        $buscar = $request->input('buscar');

        // Consultar productos, filtrando por nombre si hay una búsqueda
        $productos = Producto::when($buscar, function ($query, $buscar) {
            return $query->where('nombre', 'like', "%{$buscar}%");
        })->get();

        // Pasar los productos a la vista
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
        
    }
    /*   public function create()
    {
        $producto = new Producto();
        $producto->fotografia = 'img/1.jpg';
        return view('productos.create', compact('producto'));
    }   */

    // Guardar producto controlador
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'fecha_de_vencimiento' => 'required|date',
            'lote' => 'required|string|max:255',
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Crear el producto
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->lote = $request->lote;
        $producto->fecha_de_vencimiento = $request->fecha_de_vencimiento;
      
        // Procesar la fotografía si está presente
        if ($request->hasFile('fotografia')) {
            $fotografia = $request->file('fotografia');
            $nombreArchivo = uniqid() . '.' . $fotografia->getClientOriginalExtension();
            $fotografia->storeAs('public/img', $nombreArchivo);
            $producto->fotografia ='storage/img/' . $nombreArchivo;
        }

        // Guardar el producto en la base de datos
        $producto->save();

        $lote = new Lote();
        $lote->producto_id = $producto->id;
        $lote->fecha_de_vencimiento = $request->fecha_de_vencimiento;
        $lote->lote = $request->lote;
        $lote->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
        
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // Eliminar la fotografía si existe
        if ($producto->fotografia) {
            Storage::delete('public/img/' . $producto->fotografia);
        }

        // Eliminar el producto y su entrada correspondiente en la tabla de lotes
        $producto->delete();
        Lote::where('producto_id', $id)->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto')); // Editar vista dirección
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'fecha_de_vencimiento' => 'required|date',
            'lote' => 'required|string|max:255',
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = Producto::findOrFail($id);

        $nombreArchivo = $producto->fotografia;
        if ($request->hasFile('fotografia')) {
            if ($nombreArchivo) {
                Storage::delete('public/img/' . $nombreArchivo);
            }
            $fotografia = $request->file('fotografia');
            $nombreArchivo = uniqid() . '.' . $fotografia->getClientOriginalExtension();
            $fotografia->storeAs('public/img', $nombreArchivo);
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'lote' => $request->lote,
            'fotografia' => $nombreArchivo,
        ]);

        $producto->lotes()->update([
            'fecha_de_vencimiento' => $request->fecha_de_vencimiento,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }
}
