<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstitucionController;
use Illuminate\Support\Facades\Route;
use App\Models\Institucion;
use App\Models\Estudiante;
use App\Models\Texto;
use App\Models\Personal;

Route::get('/', function () {
    return view('welcome');
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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';