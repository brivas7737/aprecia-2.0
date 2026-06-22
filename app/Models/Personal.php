<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Rol;
use App\Models\AreaAtencion;

class Personal extends Model
{
    use SoftDeletes;

    protected $table = 'personal';

    protected $fillable = [
        'institucion_id',
        'rol_id',
        'area_atencion_id',
        'nombre',
        'apellido',
        'ci',
        'telefono',
        'correo',
        'cargo',
        'fecha_ingreso',
        'activo',
        'especialidad_certificado',
        'anios_servicio',
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }

    public function rol()
{
    return $this->belongsTo(Rol::class);
}

public function areaAtencion()
{
    return $this->belongsTo(AreaAtencion::class);
}
}