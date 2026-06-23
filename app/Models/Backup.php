<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Backup extends Model
{
    use SoftDeletes;

    protected $table = 'backups';

    protected $fillable = [

        'user_id',

        'nombre_archivo',

        'tipo',

        'tamano',

        'ruta_local',

        'ruta_nube',

        'fecha_generacion'

    ];
}