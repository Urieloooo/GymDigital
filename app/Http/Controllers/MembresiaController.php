<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use Illuminate\Http\Request;

class MembresiaController extends Controller
{
    /**
     * Mostrar todas las membresías
     */
    public function index()
    {
        $membresias = Membresia::all();

        return response()->json($membresias);
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return response()->json([
            'mensaje' => 'Formulario para crear membresía'
        ]);
    }

    /**
     * Guardar una nueva membresía
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'duracion_dias' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|max:150'
        ]);

        $membresia = Membresia::create($request->all());

        return response()->json([
            'mensaje' => 'Membresía registrada correctamente',
            'membresia' => $membresia
        ], 201);
    }

    /**
     * Mostrar una membresía específica
     */
    public function show(string $id)
    {
        $membresia = Membresia::findOrFail($id);

        return response()->json($membresia);
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(string $id)
    {
        $membresia = Membresia::findOrFail($id);

        return response()->json([
            'mensaje' => 'Formulario para editar membresía',
            'membresia' => $membresia
        ]);
    }

    /**
     * Actualizar una membresía
     */
    public function update(Request $request, string $id)
    {
        $membresia = Membresia::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50',
            'duracion_dias' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|max:150'
        ]);

        $membresia->update($request->all());

        return response()->json([
            'mensaje' => 'Membresía actualizada correctamente',
            'membresia' => $membresia
        ]);
    }

    /**
     * Eliminar una membresía
     */
    public function destroy(string $id)
    {
        $membresia = Membresia::findOrFail($id);

        $membresia->delete();

        return response()->json([
            'mensaje' => 'Membresía eliminada correctamente'
        ]);
    }
}