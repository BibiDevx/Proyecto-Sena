<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoProductoController extends BaseController
{
    // Ver los productos 
    public function verProductos($idPedido)
    {
        $pedido = Pedido::with(['productos'])->find($idPedido);

        if (!$pedido) {
            return response()->json(['message' => 'Error de pedido'], 404);
        }

        return response()->json($pedido);
    }

    // Agregar un producto
    public function agregarProducto(Request $request, $idPedido)
    {
        $request->validate([
            'idProducto' => 'required|exists:producto,idProducto',
            'cantidad'   => 'required|integer|min:1'
        ]);

        $pedido = Pedido::find($idPedido);

        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $pedido->productos()->attach($request->idProducto, ['cantidad' => $request->cantidad]);

        return response()->json(['message' => 'Producto agregado al pedido'], 201);
    }

    // Actualizar la cantidad
    public function actualizarCantidad(Request $request, $idPedido, $idProducto)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $pedido = Pedido::find($idPedido);

        if (!$pedido) {
            return response()->json(['message' => 'Error pedido'], 404);
        }

        $pedido->productos()->updateExistingPivot($idProducto, ['cantidad' => $request->cantidad]);

        return response()->json(['message' => 'Cantidad actualizada']);
    }

    // Eliminar producto
    public function eliminarProducto($idPedido, $idProducto)
    {
        $pedido = Pedido::find($idPedido);

        if (!$pedido) {
            return response()->json(['message' => 'Error pedido'], 404);
        }

        $pedido->productos()->detach($idProducto);

        return response()->json(['message' => 'Producto eliminadoo']);
    }

    // Vaciar todos los productos
    public function vaciarPedido($idPedido)
    {
        $pedido = Pedido::find($idPedido);

        if (!$pedido) {
            return response()->json(['message' => 'Error pedido'], 404);
        }

        $pedido->productos()->detach();

        return response()->json(['message' => 'Pedido vacío']);
    }
}
