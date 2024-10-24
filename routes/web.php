<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\ProductoController;

// Ruta raíz que redirige al listado de productos
Route::get('/', function () {
    return redirect()->route('productos.index'); // Redirigir a la lista de productos
});


Route::resource('productos', ProductoController::class);

