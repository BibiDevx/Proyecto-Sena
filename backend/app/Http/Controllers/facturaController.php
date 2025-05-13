<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FacturaController extends BaseController
{
    public function index(): JsonResponse
    {
        $facturas = Factura::with("pedido")->get();
        return response()->json($facturas);
    }

    public function show($id): JsonResponse
    {
        $factura = Factura::with("pedido", "detalles")->find($id);

        if (!$factura) {
            return response()->json(["message" => "Factura no encontrada"], 404);
        }

        return response()->json($factura);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            "idPedido" => "required|exists:pedido,idPedido",
            "fechaFactura" => "required|date",
            "metodoPago" => "required|string|max:50",
            "estadoFactura" => "required|string|in:pendiente,pagada,anulada",
            "observaciones" => "nullable|string",
            "subtotal" => "required|numeric|min:0",
            "iva" => "required|numeric|min:0",
            "total" => "required|numeric|min:0",
        ]);

        $factura = Factura::create($validated);

        return response()->json($factura, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $factura = Factura::find($id);

        if (!$factura) {
            return response()->json(["message" => "Factura no encontrada"], 404);
        }

        $validated = $request->validate([
            "fechaFactura" => "sometimes|date",
            "metodoPago" => "sometimes|string|max:50",
            "estadoFactura" => "sometimes|string|in:pendiente,pagada,anulada",
            "observaciones" => "nullable|string",
            "subtotal" => "sometimes|numeric|min:0",
            "iva" => "sometimes|numeric|min:0",
            "total" => "sometimes|numeric|min:0",
        ]);

        $factura->update($validated);

        return response()->json($factura);
    }

    public function destroy($id): JsonResponse
    {
        $factura = Factura::find($id);

        if (!$factura) {
            return response()->json(["message" => "Factura no encontrada"], 404);
        }

        $factura->delete();

        return response()->json(["message" => "Factura eliminada con éxito"]);
    }
}
