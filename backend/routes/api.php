<?php
//AUTH
use App\Http\Controllers\adminController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;

use Illuminate\Support\Facades\Route; 

//cliente
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function() {
    // Usar la sintaxis correcta para especificar el controlador y su método
    Route::post('/register/cliente', [AuthController::class, 'registerCliente']);
    Route::post('/register/admin', [AuthController::class, 'registerAdmin']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
});
// Rutas protegidas para clientes (requieren autenticación)
Route::middleware(['auth:api','role:Cliente'])->prefix('clientes')->group(function () {
    Route::put('/{id}', [clienteController::class, 'update']);       // Actualizar un cliente completamente
    Route::patch('/{id}', [clienteController::class, 'updatePartial']); // Actualización parcial
    Route::delete('/{id}', [clienteController::class, 'destroy']);   // Eliminar un cliente
});
//admin
Route::middleware(['auth:api','role:Admin'])->prefix('admin')->group(function () {
    Route::get('/clientes', [clienteController::class, 'index']);            // Obtener todos los clientes
    Route::get('/clientes/{id}', [clienteController::class, 'show']);         // Obtener un cliente por ID
    //el index y el show de cliente solo lo va usar admin
    Route::put('/{id}', [adminController::class, 'update']);       // Actualizar un admin completamente
    Route::patch('/{id}', [adminController::class, 'updatePartial']); // Actualización parcial
    Route::delete('/{id}', [adminController::class, 'destroy']);   // Eliminar un admin
    Route::get('/', [adminController::class, 'index']);            // Obtener todos los admin
    Route::get('/{id}', [adminController::class, 'show']);         // Obtener un admin por ID
});