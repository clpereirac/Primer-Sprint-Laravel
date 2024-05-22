<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoteController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('productos', ProductoController::class);
Route::resource('lotes', LoteController::class);

//Mis apuntes sobre RUTAS RESTFUL y rutas personalizadas
//Route::resource('lotes', LoteController::class);
//Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
//Route::post('/productos', 'ProductoController@store')->name('productos.store');
//Route::get('/lotes', 'LoteController@index')->name('lotes.index');
/*Route::get('/productos/{id}/editar', 'ProductoController@edit')->name('productos.edit');
Route::put('/productos/{id}', 'ProductoController@update')->name('productos.update');
/*Route::post('/productos', 'ProductoController@store')->name('productos.store');
Route::put('/productos/{id}', 'ProductoController@update')->name('productos.update');
/*
// Rutas para el controlador de productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
// mostramos una lista de productos, apunta al método index del controlador ProductoController, lo cual es adecuado para mostrar una lista de productos.
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
//apunta al método create del controlador ProductoController, mostraría un formulario para crear un nuevo producto.
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
// para procesar el formulario de creación de producto y almacenar los datos en la base de datos.
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
//apunta al método edit del controlador ProductoController, que muestra el formulario para editar un producto existente.
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
// procesar la actualización de un producto existente
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
//eliminar un producto
*/