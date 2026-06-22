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
        return Membresia::all();
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        return response()->json([
            'mensaje' => 'Formulario para crear membresía'
        ]);
    }

    /**
     * Guardar membresía
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
            'mensaje' => 'Membresía creada correctamente',
            'data' => $membresia
        ]);
    }

    /**
     * Mostrar una membresía
     */
    public function show(string $id)
    {
        return Membresia::findOrFail($id);
    }

    /**
     * Formulario de edición
     */
    public function edit(string $id)
    {
        return response()->json([
            'mensaje' => 'Formulario para editar membresía',
            'membresia' => Membresia::findOrFail($id)
        ]);
    }

    /**
     * Actualizar membresía
     */
    public function update(Request $request, string $id)
    {
        $membresia = Membresia::findOrFail($id);

        $membresia->update($request->all());

        return response()->json([
            'mensaje' => 'Membresía actualizada correctamente',
            'data' => $membresia
        ]);
    }

    /**
     * Eliminar membresía
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