<?php

namespace App\Http\Controllers;

use App\Models\Texto;
use App\Models\Categoria;
use App\Models\NivelEducativo;
use App\Models\AudioGenerado;
use App\Helpers\LogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TextoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = Texto::with([
        'categoria',
        'nivelEducativo'
    ]);

    if ($request->filled('categoria')) {

        $query->where(
            'categoria_id',
            $request->categoria
        );
    }

    if ($request->filled('nivel')) {

        $query->where(
            'nivel_educativo_id',
            $request->nivel
        );
    }

    if ($request->filled('titulo')) {

        $query->where(
            'titulo',
            'like',
            '%' . $request->titulo . '%'
        );
    }

    if ($request->filled('autor')) {

        $query->where(
            'autor',
            'like',
            '%' . $request->autor . '%'
        );
    }

    $textos = $query
        ->orderBy('id','desc')
        ->paginate(10);

    $categorias =
        Categoria::orderBy('nombre')
        ->get();

    $niveles =
        NivelEducativo::orderBy('nombre')
        ->get();

    return view(
        'textos.index',
        compact(
            'textos',
            'categorias',
            'niveles'
        )
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $niveles = NivelEducativo::all();

        return view('textos.create', compact(
            'categorias',
            'niveles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nivel_educativo_id' => 'required',
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'archivo' => 'required|file|mimes:pdf',
        ]);

        $ruta = null;
        $formato = null;

        if ($request->hasFile('archivo')) {

            $archivo = $request->file('archivo');

            $ruta = $archivo->store(
                'textos',
                'public'
            );

            $formato = $archivo->getClientOriginalExtension();
        }

        Texto::create([
            'categoria_id' => $request->categoria_id,
            'nivel_educativo_id' => $request->nivel_educativo_id,
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descripcion' => $request->descripcion,
            'archivo' => $ruta,
            'formato' => $formato,
            'fecha_ingreso' => now()
        ]);
        LogHelper::registrar(
    'CREAR',
    'TEXTOS',
    'Se registró un texto'
);

        return redirect()
            ->route('textos.index')
            ->with(
                'success',
                'Texto registrado correctamente'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $texto = Texto::with([
            'categoria',
            'nivelEducativo'
        ])->findOrFail($id);

        return view(
            'textos.show',
            compact('texto')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $texto = Texto::findOrFail($id);

        $categorias = Categoria::all();
        $niveles = NivelEducativo::all();

        return view(
            'textos.edit',
            compact(
                'texto',
                'categorias',
                'niveles'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $texto = Texto::findOrFail($id);

        $request->validate(

[

    'categoria_id' => 'required',

    'nivel_educativo_id' => 'required',

    'titulo' => 'required|max:255',

    'autor' => 'required|max:255',

    'archivo' => 'required|file|mimes:pdf',

],

[

    'archivo.required' =>
        'Debe seleccionar un archivo.',

    'archivo.mimes' =>
        'Solo se permiten archivos PDF.'

]

);

        $ruta = $texto->archivo;
        $formato = $texto->formato;

        if ($request->hasFile('archivo')) {

            if (
                $texto->archivo &&
                Storage::disk('public')->exists($texto->archivo)
            ) {
                Storage::disk('public')
                    ->delete($texto->archivo);
            }

            $archivo = $request->file('archivo');

            $ruta = $archivo->store(
                'textos',
                'public'
            );

            $formato = $archivo
                ->getClientOriginalExtension();
        }

        $texto->update([
            'categoria_id' => $request->categoria_id,
            'nivel_educativo_id' => $request->nivel_educativo_id,
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descripcion' => $request->descripcion,
            'archivo' => $ruta,
            'formato' => $formato
        ]);
        LogHelper::registrar(
    'EDITAR',
    'TEXTOS',
    'Se actualizó un texto'
);

        return redirect()
            ->route('textos.index')
            ->with(
                'success',
                'Texto actualizado correctamente'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $texto = Texto::findOrFail($id);

        if (
            $texto->archivo &&
            Storage::disk('public')->exists($texto->archivo)
        ) {
            Storage::disk('public')
                ->delete($texto->archivo);
        }

        $texto->delete();

        LogHelper::registrar(
    'ELIMINAR',
    'TEXTOS',
    'Se eliminó un texto'
);
        return redirect()
            ->route('textos.index')
            ->with(
                'success',
                'Texto eliminado correctamente'
            );
    }

    public function eliminados()
{
    $textos = Texto::onlyTrashed()
        ->with([
            'categoria',
            'nivelEducativo'
        ])
        ->orderBy('id','desc')
        ->get();

    return view(
        'textos.eliminados',
        compact('textos')
    );
    }

public function generarAudio($id)
{
    $texto = Texto::findOrFail($id);

    $python =
'C:\Users\Geovana\Desktop\aporte\venv\Scripts\python.exe';

    $script =
    base_path('python/audio_generator.py');

    $pdf =
    storage_path(
        'app/public/' . $texto->archivo
    );

    $nombreAudio =
    'texto_' . $texto->id . '.mp3';

    $salida =
    storage_path(
    'app/public/audios/' . $nombreAudio
    );

    $comando =
    "\"$python\" \"$script\" \"$pdf\" \"$salida\"";

    if (!file_exists(dirname($salida))) {

    mkdir(
        dirname($salida),
        0777,
        true
    );
    }

    exec($comando, $output, $return);

    if ($return == 0) {

$audio = AudioGenerado::create([

    'texto_id' => $texto->id,

    'voz_id' => 1,

    'archivo_audio' => 'audios/' . $nombreAudio,

    'duracion_segundos' => null,

    'reproducciones' => 0,

    'fecha_generacion' => now()

]);

$audio = AudioGenerado::create([

    'texto_id' => $texto->id,

    'voz_id' => 1,

    'archivo_audio' => 'audios/' . $nombreAudio,

    'duracion_segundos' => null,

    'reproducciones' => 0,

    'fecha_generacion' => now()

]);

LogHelper::registrar(

    'GENERAR AUDIO',

    'TEXTOS',

    'Se generó un audio para el texto: ' . $texto->titulo

);

        return redirect()
            ->route('textos.index')
            ->with(
                'success',
                'Audio generado correctamente'
            );
    }

    return redirect()
        ->route('textos.index')
        ->with(
            'error',
            'No se pudo generar el audio'
        );
}

public function restaurar($id)
{
    Texto::onlyTrashed()
        ->findOrFail($id)
        ->restore();
        LogHelper::registrar(
    'RESTAURAR',
    'TEXTOS',
    'Se restauró un texto'
);

    return redirect()
        ->route('textos.index')
        ->with(
            'success',
            'Texto restaurado correctamente'
        );
}

public function eliminarDefinitivo($id)
{
    Texto::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('textos.eliminados')
        ->with(
            'success',
            'Texto eliminado definitivamente'
        );
}
}