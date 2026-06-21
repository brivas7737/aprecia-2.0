<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paralelo extends Model
{
    use SoftDeletes;

    protected $table = 'paralelos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'activo'
    ];
}