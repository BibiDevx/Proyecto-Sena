<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class proveedorController extends Controller
{
    public function index()
    {
        return response()->json(Proveedor::all());
    }

    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }
        return response()->json($proveedor);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255'
        ]);

        $proveedor = Proveedor::create($request->all());
        return response()->json($proveedor, 201);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return response()->json(['message' => 'Error'], 404);
        }

        $proveedor->update($request->all());
        return response()->json($proveedor);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return response()->json(['message' => 'Error'], 404);
        }

        $proveedor->delete();
        return response()->json(['message' => 'Proveedor eliminado']);
    }
}
