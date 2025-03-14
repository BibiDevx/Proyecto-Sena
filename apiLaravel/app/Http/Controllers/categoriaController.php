<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class categoriaController extends Controller
{

    public function index()
    {
        $students = Categoria::all();
        //if ($students->isEmpty()) {
        //    $data = [
        //        'message' => 'No se encontraron el servidor estudiantes',
        //        'status' => 200
        //    ];
        //    return response()->json([$data], 404);
        //}
        $data = [
            'students' => $students,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:Spanish,English'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'No se encontraron el servidor estudiantes',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json([$data], 400);
        }
        $student = Categoria::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language
        ]);
        if (!$student) {
            $data = [
                'message' => "Error al crear estudiante",
                'status' => 500
            ];
            return response()->json([$data], 500);
        }
        $data = [
            'student' => $student,
            'status' => 201
        ];
        return response()->json([$data], 201);
    }
    public function show($id){

        $student=Categoria::find($id);
        if(!$student){
            $data=[
                'message'=>'Estudiante nom encontrado',
                'status'=>404
            ];
            return response()->json($data,404);
        }
        $data=[
            'student'=>$student,
            'status'=>200
        ];
        return response()->json($data,200);
    }
    public function destroy($id){
        $student=Categoria::find($id);
        if(!$student){
            $data=[
                'message'=>'Estudiante no encontrado',
                'status'=>404
            ];
            return response()->json($data,404);
        }
        $student->delete();

        $data=[
            'student'=>$student,
            'status'=>200
        ];
        return response()->json($data,200);
    }

    public function update(Request $request, $id){
        $student=Categoria::find($id);
        if(!$student){
            $data=[
                'message'=>'Estudiante no encontrado',
                'status'=>404
            ];
            return response()->json($data,404);
        }
        $validator = validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:Spanish,English'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'No se encontraron el servidor estudiantes',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json([$data], 400);
        }
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->language=$request->language;

        $student->save();

        $data=[
            'message'=>'Estudiante Actualizado',
            'student'=>$student,
            'status'=>200
        ];
        return response()->json($data,200);
    }
    public function updatePartial(Request $request, $id){
        $student=Categoria::find($id);
        if(!$student){
            $data=[
                'message'=>'Estudiante no encontrado',
                'status'=>404
            ];
            return response()->json($data,404);
        }
        $validator = validator::make($request->all(), [
            'name' => 'max:255',
            'email' => 'email|unique:student',
            'phone' => 'digits:10',
            'language' => 'in:Spanish,English'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'No se encontraron el servidor estudiantes',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json([$data], 400);
        }
        if($request->has('name')){
            $student->name=$request->name;
        }
        if($request->has('email')){
            $student->email=$request->email;
        }
        if($request->has('phone')){
            $student->phone=$request->phone;
        }
        if($request->has('language')){
            $student->language=$request->language;
        }

        $student->save();

        $data=[
            'message'=>'Estudiante Actualizado',
            'student'=>$student,
            'status'=>200
        ];
        return response()->json($data,200);
    }
}