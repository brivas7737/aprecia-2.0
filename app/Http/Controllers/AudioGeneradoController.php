<?php

namespace App\Http\Controllers;

use App\Models\AudioGenerado;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
    public function descargar(AudioGenerado $audio)
{
    return Storage::disk('public')
        ->download(
            $audio->archivo_audio
        );
}

public function destroy(AudioGenerado $audio)
{
    $audio->delete();

    return redirect()
        ->route('audios-generados.index')
        ->with(
            'success',
            'Audio eliminado correctamente'
        );
}
public function eliminados()
{
    $audios = AudioGenerado::onlyTrashed()
        ->with(['texto','voz'])
        ->orderBy('id','desc')
        ->get();

    return view(
        'audios_generados.eliminados',
        compact('audios')
    );
}
public function restaurar($id)
{
    AudioGenerado::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    return redirect()
        ->route('audios-generados.index')
        ->with(
            'success',
            'Audio restaurado correctamente'
        );
}

public function reproducir(AudioGenerado $audio)
{
    $audio->increment(
        'reproducciones'
    );

    return response()->json([
        'ok' => true
    ]);
}
}