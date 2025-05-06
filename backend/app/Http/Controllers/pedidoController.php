
<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    public function index()
    {
        return response()->json(Pedido::all());
    }

    public function show($id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Error pedido'], 404);
        }
        return response()->json($pedido);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_pedido' => 'required|date',
            'estado' => 'required|string'
        ]);

        $pedido = Pedido::create($request->all());
        return response()->json($pedido, 201);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Error pedido'], 404);
        }

        $pedido->update($request->all());
        return response()->json($pedido);
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Error pedido'], 404);
        }

        $pedido->delete();
        return response()->json(['message' => 'Pedido eliminado']);
    }
}
