<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CodigoController extends Controller
{
   
    

    public function codigo(Request $request)
    {
        $data = $request->validate($this->validateRequestExamen());
        $usuario = Usuario::where('id', '=', $data["id"])->first();
        if ($usuario == null) {
            return response([
                'messasge' => 'Usuario no encontrado'
            ], 404);
        }
        $codigo = Str::random(4);
        $usuario->update(["codigo_verificacion" =>"$codigo"]);
        return response([
            'message' => 'Codigo para el cambio de contraseña ' . $codigo
        ]);
    }

    public function cambio(Request $request)
    {
        $data = $request->validate($this->validateReque());
        $usuario = Usuario::where('id', '=', $data["id"])->where('codigo_verificacion', '=', $request['codigo_verificacion'])->first();
        if ($usuario == null) {
            return response([
                'messasge' => 'Usuario no encontrado'
            ], 404);
        }
        $codigo = "";
        $newContra = $request['newPass'];
        $usuario->update(["codigo_verificacion" => $codigo, "password" => $newContra]);
        return response([
            'message' => 'Cambio de contraseña exitoso'
        ]);
    }


    private function validateReque()
    {
        return [
            'id' => 'required|numeric',
            'codigo_verificacion' => 'required||string',
            'newPass' => 'required||min:4',
        ];
    }

    private function validateRequestExamen()
    {
        return [
            'id' => 'required|numeric'
        ];
    }

}

