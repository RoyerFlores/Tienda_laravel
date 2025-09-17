<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with(['cliente', 'producto'])->latest()->paginate(10);
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::where('stock', '>', 0)->get();
        return view('ventas.create', compact('clientes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->producto_id);
        
        // Verificar stock disponible
        if ($producto->stock < $request->cantidad) {
            return back()->withErrors(['cantidad' => 'Stock insuficiente. Stock disponible: ' . $producto->stock]);
        }

        // Calcular total
        $total = $producto->precio_venta * $request->cantidad;

        // Crear la venta
        $venta = Venta::create([
            'cliente_id' => $request->cliente_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio_venta,
            'total' => $total,
            'fecha' => now(),
        ]);

        // Actualizar stock del producto
        $producto->decrement('stock', $request->cantidad);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        $venta->load(['cliente', 'producto']);
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('ventas.edit', compact('venta', 'clientes', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->producto_id);
        
        // Restaurar stock anterior si cambió el producto
        if ($venta->producto_id != $request->producto_id) {
            $productoAnterior = Producto::find($venta->producto_id);
            $productoAnterior->increment('stock', $venta->cantidad);
        } else {
            // Si es el mismo producto, restaurar la cantidad anterior
            $producto->increment('stock', $venta->cantidad);
        }

        // Verificar stock disponible
        if ($producto->stock < $request->cantidad) {
            // Restaurar el stock como estaba
            if ($venta->producto_id == $request->producto_id) {
                $producto->decrement('stock', $venta->cantidad);
            }
            return back()->withErrors(['cantidad' => 'Stock insuficiente. Stock disponible: ' . $producto->stock]);
        }

        // Calcular nuevo total
        $total = $producto->precio_venta * $request->cantidad;

        // Actualizar la venta
        $venta->update([
            'cliente_id' => $request->cliente_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio_venta,
            'total' => $total,
        ]);

        // Actualizar stock del nuevo producto
        $producto->decrement('stock', $request->cantidad);

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $producto = Producto::find($venta->producto_id);
        $producto->increment('stock', $venta->cantidad);

        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente');
    }
}
