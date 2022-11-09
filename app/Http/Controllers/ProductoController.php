<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function obtener(){
        $productos = Producto::all();
        return $productos;
    }

    public function crear(Request $request){
        $data = $request->all();
        $request->validate($this -> validateRequest());
        $producto=Producto::create($data);
        return response([
            'message' => 'se registo el producto',
            'id' => $producto['id']
        ], 201);

    }

    public function actualizar($id, Request $request){
        $producto = Producto::find($id);
        if(!$producto){
            return response([
                'message'=> 'El producto con el id '. $id . 'no existe'
            ], 404 );
        }

        $data = $request->all();
        $request->validate( $this -> validateRequest());
        $producto->update($data);
        return response([
            'message' => 'se modifico el producto',
            'id' => $producto['id']
        ], 201);

    }

    public function eliminar($id){
        $producto =  Producto::find($id);

        //se valida que exista 
        if(!$producto){
            return response([
                'message' => 'El producto con el id' . $id . 'no existe'

            ], 404 );
        }

        $producto -> delete();
        return response([
            'message' => 'se elimino con exito el producto '
        ]);

    }



    private function validateRequest(){
        return [
            'nombre'=>'required|string',
            'precio'=>'required|numeric',
            'cantidad'=>'required|numeric',
            'descripcion'=>'required|string'

            //'password'=>'required|min:4'

        ];
    }
}
