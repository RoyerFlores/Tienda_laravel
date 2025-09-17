<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'categoria_id' => 'required|exists:categorias,id',
            'precio_compra' => 'required|numeric|min:0.01',
            'precio_venta' => 'required|numeric|min:0.01|gte:precio_compra',
            'stock' => 'required|integer|min:0',
            'unidad_medida' => 'nullable|string|max:20',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ], [
            'precio_venta.gte' => 'El precio de venta debe ser mayor o igual al precio de compra.',
            'min' => 'El valor ingresado debe ser mayor que cero.',
            'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',
            'stock.min' => 'El stock no puede ser negativo.'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenesProductos', 'public');
        }

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'categoria_id' => 'required|exists:categorias,id',
            'precio_compra' => 'required|numeric|min:0.01',
            'precio_venta' => 'required|numeric|min:0.01|gte:precio_compra',
            'stock' => 'required|integer|min:0',
            'unidad_medida' => 'nullable|string|max:20',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ], [
            'precio_venta.gte' => 'El precio de venta debe ser mayor o igual al precio de compra.',
            'min' => 'El valor ingresado debe ser mayor que cero.',
            'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',
            'stock.min' => 'El stock no puede ser negativo.'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('imagenesProductos', 'public');
        }

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
