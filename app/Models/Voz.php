<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voz extends Model
{
    use SoftDeletes;

    protected $table = 'voces';

    protected $fillable = [
        'nombre',
        'motor',
        'idioma',
        'genero',
        'activo'
    ];

    public function audios()
    {
        return $this->hasMany(
            AudioGenerado::class,
            'voz_id'
        );
    }
}