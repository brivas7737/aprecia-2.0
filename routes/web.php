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

    Route::resource('niveles-educativos', NivelEducativoController::class);

    Route::resource('condiciones-visuales', CondicionVisualController::class);

    Route::resource('areas-atencion', AreaAtencionController::class);

    Route::resource('categorias', CategoriaController::class);

    Route::resource('programas-servicios', ProgramaServicioController::class);

    Route::resource('estudiantes', EstudianteController::class);

    Route::resource('personal', PersonalController::class);

    Route::resource('tutores', TutorController::class);

    Route::resource('textos', \App\Http\Controllers\TextoController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';