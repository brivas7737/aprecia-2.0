<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use SoftDeletes;

    protected $table = 'personal';

    protected $fillable = [
        'institucion_id',
        'nombre',
        'apellido',
        'ci',
        'telefono',
        'correo',
        'cargo',
        'fecha_ingreso',
        'activo'
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }
}