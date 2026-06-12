<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CondicionVisual extends Model
{
    use SoftDeletes;

    protected $table = 'condiciones_visuales';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}