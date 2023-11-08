<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicamentos;

class MedicamentosController extends Controller
{
    public function get()
    {
        try {
            $data = Medicamentos::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request )
    //public function create()
{
    try {

        $data = [
            'nombre_cientifico' => $request['nombre_cientifico'],
            'nombre_generico' => $request['nombre_generico'],
            'dosis' => $request['dosis'],
            'imagen' => $request->hasFile('imagen') ? $request->file('imagen')->store('public/imagenes') : null,
            'forma_uso' => $request['forma_uso'],
            'componentes' => $request['componentes'],
            'descripcion' => $request['descripcion'],
            'contra_indicaciones' => $request['contra_indicaciones'],
        ];

        //dd($data); 
        //$res = Medicamentos::create($data);
        Medicamentos::create($request -> all());
        //dd($res);
        return response()->json($res, 200);
    } catch (\Throwable $th) {
        //return response()->json(['errorC' => $th->getMessage()], 500);
    }
}

    public function getById($id)
    {
        try {
            $data = Medicamentos::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
{
    try {
        $medicamento = Medicamentos::find($id);

        // if (!$medicamento) {
        //     return response()->json(['error' => 'Medicamento no encontrado'], 404);
        // }

        // $data['nombre_cientifico'] = $request['nombre_cientifico'];
        // $data['nombre_generico'] = $request['nombre_generico'];
        // $data['dosis'] = $request['dosis'];
        // $data['forma_uso'] = $request['forma_uso'];
        // $data['componentes'] = $request['componentes'];
        // $data['descripcion'] = $request['descripcion'];
        // $data['contra_indicaciones'] = $request['contra_indicaciones'];

        // if ($request->hasFile('imagen')) {
        //     $image = $request->file('imagen');
        //     $path = $image->store('public/imagenes');
        //     $data['imagen'] = $path;
        // }

        $data = [
            'nombre_cientifico' => $request['nombre_cientifico'],
            'nombre_generico' => $request['nombre_generico'],
            'dosis' => $request['dosis'],
            'imagen' => $request['imagen'],
            'forma_uso' => $request['forma_uso'],
            'componentes' => $request['componentes'],
            'descripcion' => $request['descripcion'],
            'contra_indicaciones' => $request['contra_indicaciones'],
        ];

        $medicamento->update($data);

        return response()->json($medicamento, 200);
    } catch (\Throwable $th) {
        return response()->json(['error' => $th->getMessage()], 500);
    }
}

    public function delete($id)
    {
        try {
            $res = Medicamentos::find($id)->delete();
            return response()->json(["Deleted" => $res], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}