<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function crearObtenerUsuario($nombreRol, $email, $password)
{
    // Buscar el rol, si no existe, crearlo
    $rol = Rol::firstOrCreate(['nombreRol' => $nombreRol]);

    // Verificar si el usuario ya existe
    $usuario = Usuario::where('email', $email)->first();

    if ($usuario) {
        // Si el usuario ya existe, verificamos que tenga el mismo rol
        if ($usuario->idRol !== $rol->idRol) {
            return response()->json(['error' => 'El usuario ya existe con otro rol'], 400);
        }
        return $usuario; // Devolver usuario existente si el rol coincide
    }

    // Si el usuario no existe, lo creamos con el rol correspondiente
    $usuario = Usuario::create([
        'idRol' => $rol->idRol,
        'email' => $email,
        'password' => Hash::make($password), // Encriptar contraseña
    ]);

    return $usuario;
}

}
