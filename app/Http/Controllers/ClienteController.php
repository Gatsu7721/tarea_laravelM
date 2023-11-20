<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/', 'max:255'],
            'correo_electronico' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        // Crear un nuevo cliente y almacenar en la base de datos
        $cliente = Cliente::create($validatedData);

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect('/')->with('success', 'Cliente agregado con éxito');
    }
        public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
{
    // Validación de datos
    $validatedData = $request->validate([
        'nombre' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/', 'max:255'],
        'correo_electronico' => 'required|email|max:255',
        'telefono' => 'nullable|string|max:20',
    ]);

    // Actualizar los datos del cliente
    $cliente->update($validatedData);

    // Redireccionar a la vista de clientes con un mensaje de éxito
    return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito');
}

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito');
    }
}
