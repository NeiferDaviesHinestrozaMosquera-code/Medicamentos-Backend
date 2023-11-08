<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
    use HasFactory;

    protected $table = "medicamentos";

    protected $fillable = [
        'nombre_cientifico',
        'nombre_generico',
        'dosis',
        'imagen',
       ' forma_uso',
        'componentes',
        'descripcion',
        'contra_indicaciones',

    ];
}
