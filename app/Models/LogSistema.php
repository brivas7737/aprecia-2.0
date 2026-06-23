<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class LogSistema extends Model
{
    use SoftDeletes;

    protected $table = 'logs_sistema';

    protected $fillable = [
        'user_id',
        'accion',
        'modulo',
        'descripcion',
        'ip',
        'navegador',
        'fecha_hora'
    ];

    public function user()
{
    return $this->belongsTo(
        User::class,
        'user_id'
    );
}
}