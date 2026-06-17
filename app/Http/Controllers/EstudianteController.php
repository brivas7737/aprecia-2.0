<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Institucion;
use App\Models\NivelEducativo;
use App\Models\CondicionVisual;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with([
            'institucion',
            'nivelEducativo',
            'condicionVisual'
        ])->orderBy('id')->get();

        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $instituciones = Institucion::orderBy('nombre')->get();
        $niveles = NivelEducativo::orderBy('nombre')->get();
        $condiciones = CondicionVisual::orderBy('nombre')->get();

        return view('estudiantes.create', compact(
            'instituciones',
            'niveles',
            'condiciones'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
        ]);

        Estudiante::create($request->all());

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante registrado correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $instituciones = Institucion::orderBy('nombre')->get();
        $niveles = NivelEducativo::orderBy('nombre')->get();
        $condiciones = CondicionVisual::orderBy('nombre')->get();

        return view('estudiantes.edit', compact(
            'estudiante',
            'instituciones',
            'niveles',
            'condiciones'
        ));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
        ]);

        $estudiante = Estudiante::findOrFail($id);

        $estudiante->update($request->all());

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $estudiante->delete();

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente');
    }
}