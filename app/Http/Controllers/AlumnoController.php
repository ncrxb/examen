<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function obtener(){
        $alumnos = Alumno::all();
        return $alumnos;
    }

    public function crear(Request $request){
        
        $data = $request->all();
        $request->validate($this -> validateRequestA());
        $alumno=Alumno::create($data);
        return  response([
            'message' => 'se creo con exito el usuario',
            'id' => $alumno['id']
        ],201);
    }


    public function actualizar ($id, Request $request){
        $alumno = Alumno::find($id);
        if(!$alumno){
            return response([
                'message' => 'El alumno con el id ' .$id. 'no existe'
            ], 404 );
        }
        $data = $request->all();
        $request-> validate( $this->validateRequestA());
        $alumno->update($data);
        return response([
            'message' => 'se modifico el alumno',
            'id' => $alumno ['id']
        ], 201);
    }

    public function eliminar($id){
        $alumno = Alumno::find($id);

        if(!$alumno){
            return response([
                'message' => 'El alumno con el id'.$id. 'no existe'
            ],404);
        }

        $alumno -> delete();
        return response([
            'message' => 'se elimino el alumno con exito'
        ]);
    }



    private function validateRequestA(){
        return [
            'nombre_alumno'=>'required|string',
            'programa_educativo'=>'required|email|string',
            'calificacion'=>'required|numeric '
        ];
    }

}
