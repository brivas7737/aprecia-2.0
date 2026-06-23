<?php

namespace App\Http\Controllers;
use App\Models\Texto;
use App\Models\BrailleGenerado;
use Illuminate\Support\Facades\Storage;
use App\Helpers\LogHelper;



use Illuminate\Http\Request;

class BrailleGeneradoController extends Controller
{
public function generar($id)
{
    $texto = Texto::findOrFail($id);

    $python =
'C:\Users\Geovana\Desktop\aporte\venv\Scripts\python.exe';

    $script =
    base_path(
        'python/extraer_texto_pdf.py'
    );

    $pdf =
    storage_path(
        'app/public/' . $texto->archivo
    );

    $comando =
    "\"$python\" \"$script\" \"$pdf\"";

    exec(
        $comando,
        $output,
        $return
    );

    if ($return == 0) {

        $contenido =
            implode("\n", $output);

$contenido = iconv(
    'UTF-8',
    'UTF-8//IGNORE',
    implode("\n", $output)
);
$contenidoBraille =
    $this->convertirBraille(
        $contenido
    );

        $nombreBrf =
            'braille_' .
            $texto->id .
            '.brf';

        $nombreTxt =
            'braille_' .
            $texto->id .
            '.txt';

Storage::disk('public')
    ->put(
        'braille/' . $nombreBrf,
        $contenidoBraille
    );

Storage::disk('public')
    ->put(
        'braille/' . $nombreTxt,
        $contenidoBraille
    );

        BrailleGenerado::create([

            'texto_id' =>
                $texto->id,

            'archivo_brf' =>
                'braille/' . $nombreBrf,

            'contenido_texto' =>
    $contenidoBraille,

            'fecha_generacion' =>
                now()

        ]);

        LogHelper::registrar(

            'GENERAR BRAILLE',

            'BRAILLES',

            'Se generó un archivo Braille para: '
            . $texto->titulo

        );

        return redirect()
            ->route(
                'brailles-generados.index'
            )
            ->with(
                'success',
                'Braille generado correctamente'
            );
    }

    return redirect()
        ->route('textos.index')
        ->with(
            'error',
            'No se pudo leer el PDF'
        );
}

public function index()
{
    $brailles = BrailleGenerado::with(
        'texto'
    )
    ->orderBy(
        'id',
        'desc'
    )
    ->get();

    return view(
        'brailles_generados.index',
        compact('brailles')
    );
}

public function descargar($id)
{
    $braille =
        BrailleGenerado::findOrFail($id);

    return response()->download(
        Storage::disk('public')
            ->path($braille->archivo_brf)
    );
}

public function destroy($id)
{
    $braille =
        BrailleGenerado::findOrFail($id);

    $braille->delete();
LogHelper::registrar(

    'ELIMINAR',

    'BRAILLES',

    'Se eliminó un braille'

);
    return redirect()
        ->route('brailles-generados.index')
        ->with(
            'success',
            'Braille eliminado correctamente'
        );
}

public function eliminados()
{
    $brailles =
        BrailleGenerado::onlyTrashed()
        ->with('texto')
        ->orderBy('id','desc')
        ->get();

    return view(
        'brailles_generados.eliminados',
        compact('brailles')
    );
}

public function restaurar($id)
{
    BrailleGenerado::onlyTrashed()
        ->findOrFail($id)
        ->restore();

        LogHelper::registrar(

    'RESTAURAR',

    'BRAILLES',

    'Se restauró un braille'

);
    return redirect()
        ->route('brailles-generados.index')
        ->with(
            'success',
            'Braille restaurado correctamente'
        );
}

public function eliminarDefinitivo($id)
{
    $braille =
        BrailleGenerado::onlyTrashed()
        ->findOrFail($id);

    $braille->forceDelete();

    LogHelper::registrar(

    'ELIMINAR DEFINITIVO',

    'BRAILLES',

    'Se eliminó definitivamente un braille'

);
    return redirect()
        ->route('brailles-generados.eliminados')
        ->with(
            'success',
            'Braille eliminado definitivamente'
        );
}

public function ver($id)
{
    $braille =
        BrailleGenerado::with('texto')
        ->findOrFail($id);

    return view(
        'brailles_generados.ver',
        compact('braille')
    );
}
private function convertirBraille($texto)
{
    $mapa = [

        'a'=>'⠁','b'=>'⠃','c'=>'⠉','d'=>'⠙','e'=>'⠑',
        'f'=>'⠋','g'=>'⠛','h'=>'⠓','i'=>'⠊','j'=>'⠚',
        'k'=>'⠅','l'=>'⠇','m'=>'⠍','n'=>'⠝','o'=>'⠕',
        'p'=>'⠏','q'=>'⠟','r'=>'⠗','s'=>'⠎','t'=>'⠞',
        'u'=>'⠥','v'=>'⠧','w'=>'⠺','x'=>'⠭','y'=>'⠽',
        'z'=>'⠵',

        'á'=>'⠁',
        'é'=>'⠑',
        'í'=>'⠊',
        'ó'=>'⠕',
        'ú'=>'⠥',

        ' '=>' ',
        "\n"=>"\n"

    ];

    $texto = mb_strtolower($texto);

    $resultado = '';

    foreach(
        preg_split(
            '//u',
            $texto,
            -1,
            PREG_SPLIT_NO_EMPTY
        )
        as $letra
    ){

        $resultado .=
            $mapa[$letra]
            ?? $letra;
    }

    return $resultado;
}

}
