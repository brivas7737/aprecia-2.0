<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaAtencion extends Model
{
    use SoftDeletes;

    protected $table = 'areas_atencion';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}