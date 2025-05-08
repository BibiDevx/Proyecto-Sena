<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends BaseController
{
    public function index()
    {
        // Lista pedidos
        return response()->json(Pedido::with("cliente")->get());
    }

    public function show($id)
    {
        //  pedido por ID
        $pedido = Pedido::with("cliente")->find($id);

        if (!$pedido) {
            return response()->json(["message" => "Pedido no encontrado"], 404);
        }

        return response()->json($pedido);
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            "idCliente" => "required|exists:cliente,idCliente",
            "fechaPedido" => "required|date"
        ]);

        // Crear el pedido
        $pedido = Pedido::create($request->all());

        return response()->json($pedido, 201);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(["message" => "Pedido no encontrado"], 404);
        }

        // Actualizar el pedido
        $pedido->update($request->all());

        return response()->json($pedido);
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(["message" => "Pedido no encontrado"], 404);
        }

        $pedido->delete();

        return response()->json(["message" => "Pedido eliminado"]);
    }
}
