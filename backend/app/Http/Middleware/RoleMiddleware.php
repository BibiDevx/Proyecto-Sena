<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Obtener el usuario autenticado
        $user = JWTAuth::parseToken()->authenticate();

        // Verificar si el usuario y su rol existen
        if (!$user || !$user->rol || $user->rol->nombreRol !== $role) {
            return response()->json(['error' => 'Acceso no autorizado'], 403);
        }

        return $next($request);
    }
}
