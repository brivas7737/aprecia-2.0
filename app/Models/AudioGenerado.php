<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AudioGenerado extends Model
{
    use SoftDeletes;

    protected $table = 'audios_generados';

    protected $fillable = [
        'texto_id',
        'voz_id',
        'archivo_audio',
        'duracion_segundos',
        'reproducciones',
        'fecha_generacion'
    ];

    public function texto()
    {
        return $this->belongsTo(
            Texto::class,
            'texto_id'
        );
    }

    public function voz()
    {
        return $this->belongsTo(
            Voz::class,
            'voz_id'
        );
    }
}