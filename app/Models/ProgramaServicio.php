<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramaServicio extends Model
{
    use SoftDeletes;

    protected $table = 'programas_servicios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];
}