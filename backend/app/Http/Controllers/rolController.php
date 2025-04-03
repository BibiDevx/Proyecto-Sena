<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Obtener todos los roles
    public function index()
    {
        $roles = Rol::all();
        return response()->json(['success' => true, 'roles' => $roles], 200);
    }

    // Buscar un rol por ID
    public function show($idRol)
    {
        $rol = Rol::find($idRol);
        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }
        return response()->json(['success' => true, 'rol' => $rol], 200);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombreRol' => 'required|string|unique:rol,nombreRol|max:50',
        ]);

        $rol = Rol::create([
            'nombreRol' => $request->nombreRol
        ]);

        return response()->json(['success' => true, 'rol' => $rol], 201);
    }

    // Eliminar un rol
    public function destroy($idRol)
    {
        $rol = Rol::find($idRol);
        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $rol->delete();
        return response()->json(['success' => true, 'message' => 'Rol eliminado correctamente'], 200);
    }
}
