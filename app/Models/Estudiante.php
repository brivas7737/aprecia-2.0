<?php

namespace App\Models;

use App\Models\Programa;
use App\Models\Servicio;
use App\Models\Paralelo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use SoftDeletes;

    protected $table = 'estudiantes';

    protected $fillable = [
        'institucion_id',
        'nivel_educativo_id',
        'condicion_visual_id',
        'nombre',
        'apellido',
        'ci',
        'fecha_nacimiento',
        'edad',
        'telefono',
        'correo',
        'direccion',
        'fecha_registro',
        'codigo_estudiantil',
        'rudees',
        'programa_id',
        'servicio_id',
        'paralelo_id',
        'foto',
        'activo'
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }

    public function nivelEducativo()
    {
        return $this->belongsTo(NivelEducativo::class);
    }

    public function condicionVisual()
    {
        return $this->belongsTo(CondicionVisual::class);
    }
    public function programa()
{
    return $this->belongsTo(
        Programa::class
    );
}

public function servicio()
{
    return $this->belongsTo(
        Servicio::class
    );
}

public function paralelo()
{
    return $this->belongsTo(
        Paralelo::class
    );
}
}