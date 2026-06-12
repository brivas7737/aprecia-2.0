<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\NivelEducativoController;
use App\Http\Controllers\CondicionVisualController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AreaAtencionController;
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
        'totalEstudiantes' => 0,
        'totalTextos' => 0,
        'totalPersonal' => 0,
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('instituciones', InstitucionController::class);

    Route::resource('niveles-educativos', NivelEducativoController::class);

    Route::resource('condiciones-visuales', CondicionVisualController::class);

    Route::resource('areas-atencion', AreaAtencionController::class);

    Route::resource('categorias', CategoriaController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';