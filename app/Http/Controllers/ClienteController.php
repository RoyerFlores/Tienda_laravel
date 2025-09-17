<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'celular' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:clientes,email',
            'direccion' => 'nullable|string|max:500',
        ]);

        $cliente = Cliente::create($validated);

        return redirect()
            ->route('clientes.index', $cliente)
            ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'celular' => 'nullable|string|max:20',
            'email' => [
                'nullable',
                'email',
                Rule::unique('clientes', 'email')->ignore($cliente->id)
            ],
            'direccion' => 'nullable|string|max:500',
        ]);

        $cliente->update($validated);

        return redirect()
            ->route('clientes.index', $cliente)
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        if ($cliente->imagen) {
            Storage::disk('public')->delete($cliente->imagen);
        }

        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado.');
    }

    public function search(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $clientes = Cliente::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('apellido', 'LIKE', "%{$query}%")
            ->orWhere('celular', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get(['id', 'nombre', 'apellido', 'celular', 'email']);

        $results = $clientes->map(function ($cliente) {
            return [
                'id' => $cliente->id,
                'text' => $cliente->nombre . ' ' . $cliente->apellido . ' - ' . $cliente->celular,
                'nombre' => $cliente->nombre,
                'apellido' => $cliente->apellido,
                'celular' => $cliente->celular,
                'email' => $cliente->email
            ];
        });

        return response()->json($results);
    }
}
