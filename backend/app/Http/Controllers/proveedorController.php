<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends BaseController
{
    public function index()
    {
        // Lista proveedores
        return response()->json(Proveedor::all());
    }

    public function show($id)
    {
        //proveedor por idProveedor
        $proveedor = Proveedor::with("productos")->find($id);

        if (!$proveedor) {
            return response()->json(["message" => "Proveedor no encontrado"], 404);
        }

        return response()->json($proveedor);
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            "nombreProveedor" => "required|string|max:255",
            "correoProveedor" => "required|email|max:255",
            "telefonoProveedor" => "required|string|max:255"
        ]);

        // Crear proveedor
        $proveedor = Proveedor::create($request->all());

        return response()->json($proveedor, 201);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json(["message" => "Proveedor no encontrado"], 404);
        }

        // Actualizar datos
        $proveedor->update($request->all());

        return response()->json($proveedor);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json(["message" => "Proveedor no encontrado"], 404);
        }

        $proveedor->delete();

        return response()->json(["message" => "Proveedor eliminado"]);
    }
}
