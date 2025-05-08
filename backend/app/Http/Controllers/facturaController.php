<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends BaseController
{
    public function index()
    {
        // Lista de las facturas
        return response()->json(Factura::with("pedido")->get());
    }

    public function show($id)
    {
        $factura = Factura::with("pedido")->find($id);

        if (!$factura) {
            return response()->json(["message" => "Error de factura"], 404);
        }

        return response()->json($factura);
    }

    public function store(Request $request)
    {
        $request->validate([
            "idPedido" => "required|exists:pedido,idPedido",
            "fechaFactura" => "required|date"
        ]);

        $factura = Factura::create($request->all());

        return response()->json($factura, 201);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);

        if (!$factura) {
            return response()->json(["message" => "Factura no encontrada"], 404);
        }

        $factura->update($request->all());

        return response()->json($factura);
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);

        if (!$factura) {
            return response()->json(["message" => "Error de factura"], 404);
        }

        $factura->delete();

        return response()->json(["message" => "Factura eliminada"]);
    }
}
