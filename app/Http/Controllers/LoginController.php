<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
   
    // EJERCICIO DE LOGIN CHAFA 
    // public function login(Request $request){
    //     $data = $request->validate([
    //         'email'=>'required|string',
    //         'password'=>'required|min:4',
    //     ]);

    //     $usuario=Usuario::where('email', '=', $data['email']) -> where('password', '=', $data['password']) -> first();
    //     if($usuario == null){
    //         return response([
    //             'message' => 'El correo o la contrase;a ingresadas no se han encontrado'
    //         ], 404);
    //     }
    //     return response([
    //         'message' => 'Hola             ' . $usuario['nombre']. '!'
    //     ]);

    // }


    public function  login(Request $request){ 
        $data = $request->validate([
                    'email'=>'required|string',
                    'password'=>'required|min:4',
                ]);
                $usuario=Usuario::where('email', '=', $data['email']) 
                -> where('password', '=', $data['password']) 
                -> first();
                if($usuario == null){
                            return response([
                                'message' => 'El correo o la contrase;a ingresadas no se han encontrado'
                            ], 404);
                }
                $token = $usuario -> createToken('app-token')->plainTextToken;

                //CREA EL TOKEN 
                return response([
                            'user'=>$usuario,
                            'token'=>$token
                        ]);
    

    }


  


    
}
