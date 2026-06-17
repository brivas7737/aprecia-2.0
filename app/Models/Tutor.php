<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor extends Model
{
    use SoftDeletes;

    protected $table = 'tutores';

    protected $fillable = [
        'estudiante_id',
        'nombre',
        'apellido',
        'ci',
        'telefono',
        'correo',
        'direccion',
        'parentesco'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}