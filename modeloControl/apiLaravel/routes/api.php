<?php
//tablas de controladores
use App\Http\Controllers\adminController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\pedidoController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\usuarioController;
//tablas intermedias
use App\Http\Controllers\pedidoProductoController;
use App\Http\Controllers\categoriaProductoController;
//
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Controladores de tablas
//cliente
Route::post('/clientes', [clienteController::class, 'store']);
Route::get('/clientes', [clienteController::class, 'index']);
Route::get('/cliente/{id}', [clienteController::class, 'show']);
Route::put('/cliente/{id}', [clienteController::class, 'update']);
Route::patch('/cliente/{id}', [clienteController::class, 'updatePartial']);
Route::delete('/cliente/{id}', [clienteController::class, 'destroy']);
//admin
Route::post('/admin', [adminController::class, 'store']);
Route::get('/admin', [adminController::class, 'index']);
Route::get('/admin/{id}', [adminController::class, 'show']);
Route::put('/admin/{id}', [adminController::class, 'update']);
Route::patch('/admin/{id}', [adminController::class, 'updatePartial']);
Route::delete('/admin/{id}', [adminController::class, 'destroy']);
//producto
Route::post('/productos', [productoController::class, 'store']);
Route::get('/productos', [productoController::class, 'index']);
Route::get('/producto/{id}', [productoController::class, 'show']);
Route::put('/producto/{id}', [productoController::class, 'update']);
Route::patch('/producto/{id}', [productoController::class, 'updatePartial']);
Route::delete('/producto/{id}', [productoController::class, 'destroy']);
//pedido
Route::post('/pedido', [pedidoController::class, 'store']);
Route::get('/pedido', [pedidoController::class, 'index']);
Route::get('/pedido/{id}', [pedidoController::class, 'show']);
Route::put('/pedido/{id}', [pedidoController::class, 'update']);
Route::patch('/pedido/{id}', [pedidoController::class, 'updatePartial']);
Route::delete('/pedido/{id}', [pedidoController::class, 'destroy']);
//categoria
Route::post('/categorias', [categoriaController::class, 'store']);
Route::get('/categorias', [categoriaController::class, 'index']);
Route::get('/categoria/{id}', [categoriaController::class, 'show']);
Route::put('/categoria/{id}', [categoriaController::class, 'update']);
Route::patch('/categoria/{id}', [categoriaController::class, 'updatePartial']);
Route::delete('/categoria/{id}', [categoriaController::class, 'destroy']);
//proveedor
Route::post('/proveedores', [proveedorController::class, 'store']);
Route::get('/proveedores', [proveedorController::class, 'index']);
Route::get('/proveedor/{id}', [proveedorController::class, 'show']);
Route::put('/proveedor/{id}', [proveedorController::class, 'update']);
Route::patch('/proveedor/{id}', [proveedorController::class, 'updatePartial']);
Route::delete('/proveedor/{id}', [proveedorController::class, 'destroy']);
//usuario
Route::post('/usuarios', [usuarioController::class, 'store']);
Route::get('/usuarios', [usuarioController::class, 'index']);
Route::get('/usuario/{id}', [usuarioController::class, 'show']);
Route::put('/usuario/{id}', [usuarioController::class, 'update']);
Route::patch('/usuario/{id}', [usuarioController::class, 'updatePartial']);
Route::delete('/usuario/{id}', [usuarioController::class, 'destroy']);

//controladores de tablas intermedias

//pedidoProducto
Route::post('/pedidoProducto', [pedidoProductoController::class, 'store']);
Route::get('/pedidoProducto', [pedidoProductoController::class, 'index']);
Route::get('/pedidoProducto/{id}', [pedidoProductoController::class, 'show']);
Route::put('/pedidoProducto/{id}', [pedidoProductoController::class, 'update']);
Route::patch('/pedidoProducto/{id}', [pedidoProductoController::class, 'updatePartial']);
Route::delete('/pedidoProducto/{id}', [pedidoProductoController::class, 'destroy']);
//categoriaProducto
Route::post('/categoriaProducto', [categoriaProductoController::class, 'store']);
Route::get('/categoriaProducto', [categoriaProductoController::class, 'index']);
Route::get('/categoriaProducto/{id}', [categoriaProductoController::class, 'show']);
Route::put('/categoriaProducto/{id}', [categoriaProductoController::class, 'update']);
Route::patch('/categoriaProducto/{id}', [categoriaProductoController::class, 'updatePartial']);
Route::delete('/categoriaProducto/{id}', [categoriaProductoController::class, 'destroy']);