<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsuarioController extends Controller
{
    public function obtener(){
        $usuarios = Usuario::all();
        return $usuarios;
    }

    public function crear(Request $request){
        $data = $request->all();
        $request->validate($this -> validateRequest());
        $usuario=Usuario::create($data);
        return response([
            'message' => 'se registo con exito el usuario',
            'id' => $usuario['id']
        ], 201);

    }

    public function actualizar($id, Request $request){
        $usuarios = Usuario::find($id);
        if(!$usuarios){
            return response([
                'message'=> 'El usuario con el id '. $id . 'no existe'
            ], 404 );
        }

        $data = $request->all();
        $request->validate( $this -> validateRequest());
        $usuarios->update($data);
        return response([
            'message' => 'se modifico el usuario',
            'id' => $usuarios['id']
        ], 201);

    }

    public function eliminar($id){
        $usuario =  Usuario::find($id);

        //se valida que exista 
        if(!$usuario){
            return response([
                'message' => 'El usuario con el id' . $id . 'no existe'

            ], 404 );
        }

        $usuario -> delete();
        return response([
            'message' => 'se elimino con exito el usuario '
        ]);

    }

  





    private function validateRequest(){
        return [
            'nombre'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|min:4',
            'edad'=>'required|numeric',
           //'codigo_verificacion'=>'required|numeric',

            //'password'=>'required|min:4'

        ];
    }


    
}
