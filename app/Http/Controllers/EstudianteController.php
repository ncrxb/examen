<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
  



    public function obtener()
    {
        $emcbeca = estudiante::where('becado', '=', "true")->where('genero', '=', 'Male')->count();
        $efcbeca = estudiante::where('becado', '=', "true")->where('genero', '=', 'Female')->count();
        $emsbeca = estudiante::where('becado', '=', "false")->where('genero', '=', 'Male')->count();
        $efsbeca = estudiante::where('becado', '=', "false")->where('genero', '=', 'Female')->count();

        return  'total_masculinos_becados:' . $emcbeca . ' ' .
                'total_femenino_becados:' . $efcbeca . ' ' .
                'total_masculinos_no_becados:' . $emsbeca . ' ' .
                'total_femenino_no_becados:' . $efsbeca;
    }
}
