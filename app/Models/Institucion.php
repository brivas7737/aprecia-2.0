<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institucion extends Model
{
    use SoftDeletes;

    protected $table = 'instituciones';

    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'telefono',
        'correo',
        'director',
        'estado'
    ];
}