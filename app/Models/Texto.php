<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Texto extends Model
{
    use SoftDeletes;

    protected $table = 'textos';

    protected $fillable = [
        'categoria_id',
        'nivel_educativo_id',
        'user_id',
        'titulo',
        'autor',
        'descripcion',
        'archivo',
        'formato',
        'fecha_ingreso'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function nivelEducativo()
    {
        return $this->belongsTo(NivelEducativo::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}