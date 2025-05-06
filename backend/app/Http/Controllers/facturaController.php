<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class facturaController extends Controller
{
    public function index()
    {
        return response()->json(Factura::all());
    }

    public function show($id)
    {
        $factura = Factura::find($id);
        if (!$factura) {
            return response()->json(['message' => 'Error'], 404);
        }
        return response()->json($factura);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric'
        ]);

        $factura = Factura::create($request->all());
        return response()->json($factura, 201);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);
        if (!$factura) {
            return response()->json(['message' => 'Error'], 404);
        }

        $factura->update($request->all());
        return response()->json($factura);
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);
        if (!$factura) {
            return response()->json(['message' => 'Error'], 404);
        }

        $factura->delete();
        return response()->json(['message' => 'Eliminada']);
    }
}
