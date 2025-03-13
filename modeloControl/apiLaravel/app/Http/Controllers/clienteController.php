<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class clienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        //if ($clientes->isEmpty()) {
        //    $data = [
        //        'message' => 'No se encontraron el servidor estudiantes',
        //        'status' => 200
        //    ];
        //    return response()->json([$data], 404);
        //}
        $data = [
            'clientes' => $clientes,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idCliente' => 'required|unique:cliente',
            'idUsuario' => 'required|max:255',
            'nombreCliente' => 'required|max:255',
            'apellidoCliente' => 'required|max:255',
            'cedulaCliente' => 'required|unique:cliente',
            'correoCliente' => 'required|email',
            'passwordCliente' => 'required|password',
            'telefonoCliente' => 'required',
            'direccionCliente' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        try {

            $cliente = Cliente::create([
                'idCliente' => $request->idCliente,
                'idUsuario' => $request->idUsuario,
                'nombreCliente' => $request->nombreCliente,
                'apellidoCliente' => $request->apellidoCliente,
                'cedulaCliente' => $request->cedulaCliente,
                'correoCliente' => $request->correoCliente,
                'passwordCliente' => $request->passwordCliente,
                'telefonoCliente' => $request->telefonoCliente,
                'direccionCliente' => $request->direccionCliente
            ]);

            return response()->json([
                'cliente' => $cliente,
                'status' => 201
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Error al crear estudiante",
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
    public function show($idCliente)
    {

        $cliente = Cliente::find($idCliente);
        if (!$cliente) {
            $data = [
                'message' => 'Estudiante nom encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'cliente' => $cliente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($idCliente)
    {
        $cliente = Cliente::find($idCliente);
        if (!$cliente) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $cliente->delete();

        $data = [
            'cliente' => $cliente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $idCliente)
    {
        $cliente = Cliente::find($idCliente);
        if (!$cliente) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = validator::make($request->all(), [
            'idCliente' => 'required|unique:cliente',
            'idUsuario' => 'required|max:255',
            'nombreCliente' => 'required|max:255',
            'apellidoCliente' => 'required|max:255',
            'cedulaCliente' => 'required|unique:cliente',
            'correoCliente' => 'required|email',
            'passwordCliente' => 'required|password',
            'telefonoCliente' => 'required',
            'direccionCliente' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'No se encontraron el servidor estudiantes',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json([$data], 400);
        }
        $cliente->idCliente = $request->idCliente;
        $cliente->idUsuario = $request->idUsuario;
        $cliente->nombreCliente = $request->nombreCliente;
        $cliente->apellidoCliente = $request->apellidoCliente;
        $cliente->cedulaCliente = $request->cedulaCliente;
        $cliente->correoCliente = $request->correoCliente;
        $cliente->passwordCliente = $request->passwordCliente;
        $cliente->telefonoCliente = $request->telefonoCliente;
        $cliente->direccionCliente = $request->direccionCliente;

        $cliente->save();

        $data = [
            'message' => 'Estudiante Actualizado',
            'cliente' => $cliente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function updatePartial(Request $request, $idCliente)
    {
        $cliente = Cliente::find($idCliente);
        if (!$cliente) {
            return response()->json([
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'idCliente' => 'nullable|unique:cliente',
            'idUsuario' => 'nullable|max:255',
            'nombreCliente' => 'nullable|max:255',
            'apellidoCliente' => 'nullable|max:255',
            'cedulaCliente' => 'nullable|unique:cliente',
            'correoCliente' => 'nullable|email',
            'passwordCliente' => 'nullable|password',
            'telefonoCliente' => 'nullable',
            'direccionCliente' => 'nullable|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        if ($request->has('idCliente')) {
            $cliente->idCliente = $request->idCliente;
        }

        if ($request->has('idUsuario')) {
            $cliente->idUsuario = $request->idUsuario;
        }

        if ($request->has('nombreCliente')) {
            $cliente->nombreCliente = $request->nombreCliente;
        }

        if ($request->has('apellidoCliente')) {
            $cliente->apellidoCliente = $request->apellidoCliente;
        }

        if ($request->has('cedulaCliente')) {
            $cliente->cedulaCliente = $request->cedulaCliente;
        }

        if ($request->has('correoCliente')) {
            $cliente->correoCliente = $request->correoCliente;
        }

        if ($request->has('passwordCliente')) {
            $cliente->passwordCliente = $request->passwordCliente;
        }

        if ($request->has('telefonoCliente')) {
            $cliente->telefonoCliente = $request->telefonoCliente;
        }

        if ($request->has('direccionCliente')) {
            $cliente->direccionCliente = $request->direccionCliente;
        }

        $cliente->save();

        return response()->json([
            'message' => 'Estudiante actualizado',
            'cliente' => $cliente,
            'status' => 200
        ], 200);
    }
}