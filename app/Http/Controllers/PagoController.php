<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Mostrar todos los pagos
     */
    public function index()
    {
        $pagos = Pago::with(['cliente', 'membresia', 'user'])->get();

        return response()->json($pagos);
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return response()->json([
            'mensaje' => 'Formulario para crear pago'
        ]);
    }

    /**
     * Guardar un nuevo pago
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'user_id' => 'required|exists:users,id',
            'membresia_id' => 'required|exists:membresias,id',
            'monto' => 'required|numeric',
            'metodo_pago' => 'required|in:Efectivo,Transferencia',
            'fecha_pago' => 'required|date'
        ]);

        $pago = Pago::create($request->all());

        return response()->json([
            'mensaje' => 'Pago registrado correctamente',
            'pago' => $pago
        ], 201);
    }

    /**
     * Mostrar un pago específico
     */
    public function show(string $id)
    {
        $pago = Pago::with(['cliente', 'membresia', 'user'])->findOrFail($id);

        return response()->json($pago);
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(string $id)
    {
        $pago = Pago::findOrFail($id);

        return response()->json([
            'mensaje' => 'Formulario para editar pago',
            'pago' => $pago
        ]);
    }

    /**
     * Actualizar un pago
     */
    public function update(Request $request, string $id)
    {
        $pago = Pago::findOrFail($id);

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'user_id' => 'required|exists:users,id',
            'membresia_id' => 'required|exists:membresias,id',
            'monto' => 'required|numeric',
            'metodo_pago' => 'required|in:Efectivo,Transferencia',
            'fecha_pago' => 'required|date'
        ]);

        $pago->update($request->all());

        return response()->json([
            'mensaje' => 'Pago actualizado correctamente',
            'pago' => $pago
        ]);
    }

    /**
     * Eliminar un pago
     */
    public function destroy(string $id)
    {
        $pago = Pago::findOrFail($id);

        $pago->delete();

        return response()->json([
            'mensaje' => 'Pago eliminado correctamente'
        ]);
    }
}