<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Mostrar todos los clientes
     */
    public function index()
    {
        $clientes = Cliente::with('membresia')->get();

        return response()->json($clientes);
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        //
    }

    /**
     * Guardar un nuevo cliente
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|max:100',
            'edad' => 'required|integer',
            'telefono' => 'required|max:15|unique:clientes',
            'correo' => 'nullable|email',
            'genero' => 'nullable|max:20',
            'fecha_inscripcion' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'estado' => 'required',
            'membresia_id' => 'required|exists:membresias,id'
        ]);

        $cliente = Cliente::create($request->all());

        return response()->json([
            'mensaje' => 'Cliente registrado correctamente',
            'cliente' => $cliente
        ], 201);
    }

    /**
     * Mostrar un cliente específico
     */
    public function show(string $id)
    {
        $cliente = Cliente::with('membresia')->findOrFail($id);

        return response()->json($cliente);
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Actualizar un cliente
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nombre_completo' => 'required|max:100',
            'edad' => 'required|integer',
            'telefono' => 'required|max:15',
            'correo' => 'nullable|email',
            'genero' => 'nullable|max:20',
            'fecha_inscripcion' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'estado' => 'required',
            'membresia_id' => 'required|exists:membresias,id'
        ]);

        $cliente->update($request->all());

        return response()->json([
            'mensaje' => 'Cliente actualizado correctamente',
            'cliente' => $cliente
        ]);
    }

    /**
     * Eliminar un cliente
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return response()->json([
            'mensaje' => 'Cliente eliminado correctamente'
        ]);
    }
}