<?php

namespace App\Http\Controllers;

use App\Models\AudioGenerado;

class AudioGeneradoController extends Controller
{
    public function index()
    {
        $audios = AudioGenerado::with([
            'texto',
            'voz'
        ])
        ->orderBy('id','desc')
        ->paginate(10);

        return view(
            'audios_generados.index',
            compact('audios')
        );
    }
}