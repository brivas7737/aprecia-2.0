<?php

namespace App\Http\Controllers;
use App\Models\Backup;
use App\Helpers\LogHelper;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function generar()
{
    $fecha =
        now()->format('Y_m_d_H_i_s');

    $nombreArchivo =
        'backup_' . $fecha . '.sql';

    $carpeta =
        storage_path('app/backups');

    if (!file_exists($carpeta)) {

        mkdir(
            $carpeta,
            0777,
            true
        );
    }

    $rutaCompleta =
        $carpeta . DIRECTORY_SEPARATOR . $nombreArchivo;

    putenv('PGPASSWORD=password');

    $pgDump =
'C:\Program Files\PostgreSQL\17\bin\pg_dump.exe';

    $comando =
        "\"$pgDump\" -U postgres -d aprecia_db -f \"$rutaCompleta\"";

    exec($comando, $output, $return);

    if ($return === 0) {

        Backup::create([

            'user_id' =>
                Auth::id(),

            'nombre_archivo' =>
                $nombreArchivo,

            'tipo' =>
                'SQL',

            'tamano' =>
                filesize($rutaCompleta),

            'ruta_local' =>
                $rutaCompleta,

            'ruta_nube' =>
                null,

            'fecha_generacion' =>
                now()

        ]);

        LogHelper::registrar(

            'GENERAR BACKUP',

            'BACKUPS',

            'Se generó un backup de la base de datos'

        );

        return redirect()
            ->route('backups.index')
            ->with(
                'success',
                'Backup generado correctamente'
            );
    }

    return redirect()
        ->route('backups.index')
        ->with(
            'error',
            'No se pudo generar el backup'
        );
}

public function index()
{
    $backups = Backup::orderBy(
        'id',
        'desc'
    )->get();

    return view(
        'backups.index',
        compact('backups')
    );
}

public function descargar($id)
{
    $backup = Backup::findOrFail($id);

    return response()->download(
        $backup->ruta_local
    );
}

public function destroy($id)
{
    $backup = Backup::findOrFail($id);

    if (
        file_exists(
            $backup->ruta_local
        )
    ) {

        unlink(
            $backup->ruta_local
        );

    }

    $backup->delete();

    LogHelper::registrar(

        'ELIMINAR BACKUP',

        'BACKUPS',

        'Se eliminó un backup'

    );

    return redirect()
        ->route('backups.index')
        ->with(
            'success',
            'Backup eliminado correctamente'
        );
}

public function eliminados()
{
    $backups =
        Backup::onlyTrashed()
        ->orderBy('id', 'desc')
        ->get();

    return view(
        'backups.eliminados',
        compact('backups')
    );
}

public function restaurar($id)
{
    Backup::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    LogHelper::registrar(

        'RESTAURAR BACKUP',

        'BACKUPS',

        'Se restauró un backup'

    );

    return redirect()
        ->route('backups.index')
        ->with(
            'success',
            'Backup restaurado correctamente'
        );
}

public function eliminarDefinitivo($id)
{
    $backup = Backup::onlyTrashed()
        ->findOrFail($id);

    $backup->forceDelete();

    LogHelper::registrar(

        'ELIMINAR DEFINITIVO',

        'BACKUPS',

        'Se eliminó definitivamente un backup'

    );

    return redirect()
        ->route('backups.eliminados')
        ->with(
            'success',
            'Backup eliminado definitivamente'
        );
}

}
