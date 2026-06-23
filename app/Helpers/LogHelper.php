<?php

namespace App\Helpers;

use App\Models\LogSistema;
use Illuminate\Support\Facades\Auth;

class LogHelper
{
    public static function registrar(
        $accion,
        $modulo,
        $descripcion
    )
    {
        LogSistema::create([

            'user_id' => Auth::id(),

            'accion' => $accion,

            'modulo' => $modulo,

            'descripcion' => $descripcion,

            'ip' => request()->ip(),

            'navegador' =>
                request()->userAgent(),

            'fecha_hora' => now()

        ]);
    }
}