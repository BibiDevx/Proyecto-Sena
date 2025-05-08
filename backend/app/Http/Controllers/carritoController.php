<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends BaseController
{
    public function verCarrito($idUsuario)
    {
        // Obtener el carrito activo del usuario
        $carrito = Carrito::with(['productos'])->where('idUsuario', $idUsuario)->where('estado', 'activo')->first();

        if (!$carrito) {
            return response()->json(["message" => "Carrito no encontrado"], 404);
        }

        return response()->json($carrito);
    }

    public function agregarProducto(Request $request, $idUsuario)
    {
        // Validar los datos de la entrada
        $request->validate([
            "idProducto" => "required|exists:producto,idProducto",
            "cantidad"   => "required|integer|min:1"
        ]);

        //crear el carrito 
        $carrito = Carrito::firstOrCreate(
            ['idUsuario' => $idUsuario, 'estado' => 'activo'],
            ['estado' => 'activo']
        );

        // Agregar el producto al carrito
        $carrito->productos()->attach($request->idProducto, ['cantidad' => $request->cantidad]);

        return response()->json(["message" => "Producto agregado al carrito"], 201);
    }

    public function actualizarCantidad(Request $request, $idUsuario, $idProducto)
    {
        // Validar la cantidad
        $request->validate([
            "cantidad" => "required|integer|min:1"
        ]);

        // Obtener el carrito activo del usuario
        $carrito = Carrito::where('idUsuario', $idUsuario)->where('estado', 'activo')->first();

        if (!$carrito) {
            return response()->json(["message" => "Carrito no encontrado"], 404);
        }

        // Actualizar la cantidad del producto en el carrito
        $carrito->productos()->updateExistingPivot($idProducto, ['cantidad' => $request->cantidad]);

        return response()->json(["message" => "Cantidad actualizada correctamente"]);
    }

    public function eliminarProducto($idUsuario, $idProducto)
    {
        // Obtener el carrito activo del usuario
        $carrito = Carrito::where('idUsuario', $idUsuario)->where('estado', 'activo')->first();

        if (!$carrito) {
            return response()->json(["message" => "Carrito no encontrado"], 404);
        }

        // Eliminar el producto del carrito
        $carrito->productos()->detach($idProducto);

        return response()->json(["message" => "Producto eliminado del carrito"]);
    }

    public function vaciarCarrito($idUsuario)
    {
        // Obtener el carrito activo del usuario
        $carrito = Carrito::where('idUsuario', $idUsuario)->where('estado', 'activo')->first();

        if (!$carrito) {
            return response()->json(["message" => "Carrito no encontrado"], 404);
        }

        // Vaciar el carrito
        $carrito->productos()->detach();

        return response()->json(["message" => "Carrito vaciado"]);
    }

    public function finalizarCarrito($idUsuario)
    {
        // Obtener el carrito activo
        $carrito = Carrito::where('idUsuario', $idUsuario)->where('estado', 'activo')->first();

        if (!$carrito) {
            return response()->json(["message" => "Carrito no encontrado"], 404);
        }

        // Cambiar el estado del carrito a 'completado'
        $carrito->update(['estado' => 'completado']);

        return response()->json(["message" => "Carrito finalizado"]);
    }
}
