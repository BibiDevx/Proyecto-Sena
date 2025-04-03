<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ClienteController extends BaseController
{
    // 🔹 Obtener todos los clientes
    public function index()
    {
        $clientes = Cliente::all();
        return $this->sendResponse($clientes, 'Lista de clientes obtenida exitosamente.');
    }

    // 🔹 Obtener un cliente por ID
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return $this->sendError('Cliente no encontrado.', [], 404);
        }
        return $this->sendResponse($cliente, 'Cliente encontrado.');
    }
    

    // 🔹 Actualizar parcialmente un cliente
    public function updatePartial(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return $this->sendError('Cliente no encontrado.', [], 404);
        }

        // Validaciones solo para los campos enviados
        $validator = Validator::make($request->all(), [
            'nombreCliente' => 'sometimes|string|max:255',
            'apellidoCliente' => 'sometimes|string|max:255',
            'cedulaCliente' => 'sometimes|numeric|unique:cliente,cedulaCliente,' . $id . ',idCliente',
            'email' => 'sometimes|string|email|max:255|unique:cliente,email,' . $id . ',idCliente',
            'password' => 'sometimes|string|min:6',
            'telefonoCliente' => 'sometimes|numeric',
            'direccion' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 422);
        }

        // Obtener los campos que se enviaron
        $input = $request->only([
            'nombreCliente',
            'apellidoCliente',
            'cedulaCliente',
            'email',
            'telefonoCliente',
            'direccion',
        ]);

        // Si enviaron clave, cifrarla
        if ($request->has('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $cliente->update($input);

        return $this->sendResponse($cliente, 'Cliente actualizado correctamente.');
    }

    // 🔹 Eliminar un cliente
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return $this->sendError('Cliente no encontrado.', [], 404);
        }

        $cliente->delete();
        return $this->sendResponse([], 'Cliente eliminado exitosamente.');
    }
}
