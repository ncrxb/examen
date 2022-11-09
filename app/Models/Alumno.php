<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //VINCULAR MANUALMENTE
    //protected $table='sucursales'
    use HasFactory;
    
    protected $fillable=[
        'nombre_alumno',
        'programa_educativo',
        'calificacion'
    ];
   
}
