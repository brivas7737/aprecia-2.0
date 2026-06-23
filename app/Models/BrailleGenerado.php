<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrailleGenerado extends Model
{
    use SoftDeletes;

    protected $table =
        'brailles_generados';

    protected $fillable = [

    'texto_id',

    'archivo_brf',

    'contenido_texto',

    'fecha_generacion'

];

    public function texto()
    {
        return $this->belongsTo(
            Texto::class
        );
    }

    
}