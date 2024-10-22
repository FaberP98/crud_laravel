<?php
namespace App\Http\Controllers; // Asegúrate de que este namespace esté correcto


use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = new Producto($request->all());

        if ($request->hasFile('imagen')) {
            $producto->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $producto->save();
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto->update($request->all());

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::delete('public/' . $producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $producto->save();
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::delete('public/' . $producto->imagen);
        }
        $producto->delete();
        return redirect()->route('productos.index');
    }
}