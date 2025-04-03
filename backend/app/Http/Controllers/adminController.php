<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class adminController extends BaseController
{
    // 🔹 Obtener todos los admins
    public function index()
    {
        $admins = Admin::all();
        return $this->sendResponse($admins, 'Lista de admins obtenida exitosamente.');
    }

    // 🔹 Obtener un admin por ID
    public function show($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return $this->sendError('admin no encontrado.', [], 404);
        }
        return $this->sendResponse($admin, 'admin encontrado.');
    }

    // 🔹 Actualizar parcialmente un admin
    public function updatePartial(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return $this->sendError('admin no encontrado.', [], 404);
        }

        // Validaciones solo para los campos enviados
        $validator = Validator::make($request->all(), [
            'nombreAdmin' => 'sometimes|string|max:255',
            'apellidoadmin' => 'sometimes|string|max:255',
            'cedulaAdmin' => 'sometimes|numeric|unique:admin,cedulaAdmin,' . $id . ',idAdmin',
            'email' => 'sometimes|string|email|max:255|unique:admin,email,' . $id . ',idAdmin',
            'password' => 'sometimes|string|min:6',
            'telefonoAdmin' => 'sometimes|numeric'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 422);
        }

        // Obtener los campos que se enviaron
        $input = $request->only([
            'nombreAdmin',
            'apellidoAdmin',
            'cedulaAdmin',
            'email',
            'telefonoAdmin'
        ]);

        // Si enviaron clave, cifrarla
        if ($request->has('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $admin->update($input);

        return $this->sendResponse($admin, 'admin actualizado correctamente.');
    }

    // 🔹 Eliminar un admin
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return $this->sendError('admin no encontrado.', [], 404);
        }

        $admin->delete();
        return $this->sendResponse([], 'admin eliminado exitosamente.');
    }
}
