<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\NivelEducativoController;
use App\Http\Controllers\CondicionVisualController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AreaAtencionController;
use App\Http\Controllers\ProgramaServicioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\TextoController;
use App\Http\Controllers\AudioGeneradoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Models\Institucion;
use App\Models\Estudiante;
use App\Models\Texto;
use App\Models\Personal;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {

    return view('dashboard', [
        'totalInstituciones' => Institucion::count(),
        'totalEstudiantes' => Estudiante::count(),
        'totalTextos' => Texto::count(),
        'totalPersonal' => Personal::count(),
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('instituciones', InstitucionController::class);

    Route::get(
        'instituciones-eliminadas',
        [InstitucionController::class, 'eliminados']
    )->name('instituciones.eliminados');

    Route::post(
        'instituciones/{id}/restaurar',
        [InstitucionController::class, 'restaurar']
    )->name('instituciones.restaurar');

    Route::get(
        'instituciones/{id}/ver',
        [InstitucionController::class, 'ver']
    )->name('instituciones.ver');

    Route::resource('niveles-educativos', NivelEducativoController::class);

    Route::get(
'niveles-educativos-eliminados',
[NivelEducativoController::class,'eliminados']
)->name('niveles-educativos.eliminados');

Route::post(
'niveles-educativos/{id}/restaurar',
[NivelEducativoController::class,'restaurar']
)->name('niveles-educativos.restaurar');

Route::get(
'niveles-educativos/{id}/ver',
[NivelEducativoController::class,'ver']
)->name('niveles-educativos.ver');

    Route::resource('condiciones-visuales', CondicionVisualController::class);

    Route::get(
'condiciones-visuales-eliminadas',
[CondicionVisualController::class,'eliminados']
)->name('condiciones-visuales.eliminados');

Route::post(
'condiciones-visuales/{id}/restaurar',
[CondicionVisualController::class,'restaurar']
)->name('condiciones-visuales.restaurar');

Route::get(
'condiciones-visuales/{id}/ver',
[CondicionVisualController::class,'ver']
)->name('condiciones-visuales.ver');

    Route::resource('areas-atencion', AreaAtencionController::class);

    Route::resource('categorias', CategoriaController::class);

    Route::get(
'categorias-eliminadas',
[CategoriaController::class,'eliminados']
)->name('categorias.eliminados');

Route::post(
'categorias/{id}/restaurar',
[CategoriaController::class,'restaurar']
)->name('categorias.restaurar');

Route::get(
'categorias/{id}/ver',
[CategoriaController::class,'ver']
)->name('categorias.ver');

    Route::resource('programas-servicios', ProgramaServicioController::class);

    Route::resource('estudiantes', EstudianteController::class);

    Route::get(
        'estudiantes/{estudiante}/ver',
        [EstudianteController::class, 'ver']
    )->name('estudiantes.ver');

    Route::resource('personal', PersonalController::class);

    Route::resource('tutores', TutorController::class);

    Route::get(
        'tutores-eliminados',
        [TutorController::class, 'eliminados']
    )->name('tutores.eliminados');

    Route::post(
        'tutores/{id}/restaurar',
        [TutorController::class, 'restaurar']
    )->name('tutores.restaurar');

    Route::get(
        'tutores/{id}/ver',
        [TutorController::class, 'ver']
    )->name('tutores.ver');

    Route::resource('textos', \App\Http\Controllers\TextoController::class);

    Route::get(
        'textos/{texto}/audio',
        [TextoController::class, 'generarAudio']
    )->name('textos.generarAudio');

    Route::resource(
        'audios-generados',
        AudioGeneradoController::class
    )->only(['index']);

    Route::get(
        'audios-generados/{audio}/descargar',
        [AudioGeneradoController::class, 'descargar']
    )->name('audios-generados.descargar');

    Route::delete(
        'audios-generados/{audio}',
        [AudioGeneradoController::class, 'destroy']
    )->name('audios-generados.destroy');

    Route::get(
        'audios-generados-eliminados',
        [AudioGeneradoController::class, 'eliminados']
    )->name('audios-generados.eliminados');

    Route::post(
        'audios-generados/{id}/restaurar',
        [AudioGeneradoController::class, 'restaurar']
    )->name('audios-generados.restaurar');

    Route::post(
        'audios-generados/{audio}/reproducir',
        [AudioGeneradoController::class, 'reproducir']
    )->name('audios-generados.reproducir');

    Route::get(
        'textos-eliminados',
        [TextoController::class, 'eliminados']
    )->name('textos.eliminados');

    Route::post(
        'textos/{id}/restaurar',
        [TextoController::class, 'restaurar']
    )->name('textos.restaurar');

    Route::get(
        'estudiantes-eliminados',
        [EstudianteController::class, 'eliminados']
    )->name('estudiantes.eliminados');

    Route::post(
        'estudiantes/{id}/restaurar',
        [EstudianteController::class, 'restaurar']
    )->name('estudiantes.restaurar');

    Route::resource(
        'programas',
        ProgramaController::class
    );

    Route::get(
        'programas-eliminados',
        [ProgramaController::class, 'eliminados']
    )->name('programas.eliminados');

    Route::post(
        'programas/{id}/restaurar',
        [ProgramaController::class, 'restaurar']
    )->name('programas.restaurar');

    Route::get(
    'programas/{id}/ver',
    [ProgramaController::class,'ver']
)->name('programas.ver');

    Route::resource(
        'servicios',
        ServicioController::class
    );

    Route::get(
        'servicios-eliminados',
        [ServicioController::class, 'eliminados']
    )->name('servicios.eliminados');

    Route::post(
        'servicios/{id}/restaurar',
        [ServicioController::class, 'restaurar']
    )->name('servicios.restaurar');

    Route::get(
    'servicios/{id}/ver',
    [ServicioController::class,'ver']
)->name('servicios.ver');

    Route::resource(
        'paralelos',
        ParaleloController::class
    );

    Route::get(
        'paralelos-eliminados',
        [ParaleloController::class, 'eliminados']
    )->name('paralelos.eliminados');

    Route::post(
        'paralelos/{id}/restaurar',
        [ParaleloController::class, 'restaurar']
    )->name('paralelos.restaurar');

    Route::get(
    'paralelos/{id}/ver',
    [ParaleloController::class,'ver']
)->name('paralelos.ver');

    Route::get(
        'personal/{personal}/ver',
        [PersonalController::class, 'ver']
    )->name('personal.ver');

    Route::get(
        'personal-eliminados',
        [PersonalController::class, 'eliminados']
    )->name('personal.eliminados');

    Route::post(
        'personal/{id}/restaurar',
        [PersonalController::class, 'restaurar']
    )->name('personal.restaurar');

Route::resource('roles', RolController::class);

Route::get(
    'roles-eliminados',
    [RolController::class,'eliminados']
)->name('roles.eliminados');

Route::post(
    'roles/{id}/restaurar',
    [RolController::class,'restaurar']
)->name('roles.restaurar');

Route::get(
    'roles/{id}/ver',
    [RolController::class,'ver']
)->name('roles.ver');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__ . '/auth.php';