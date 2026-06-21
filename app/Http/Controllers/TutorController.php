<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index()
    {
        $tutores = Tutor::with('estudiante')
            ->latest()
            ->get();

        return view('tutores.index', compact('tutores'));
    }

    public function create()
    {
        $estudiantes = Estudiante::orderBy('apellido')
            ->get();

        return view('tutores.create', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        Tutor::create($request->all());

        return redirect()
            ->route('tutores.index')
            ->with('success', 'Tutor registrado correctamente');

        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'correo' => 'nullable|email',
            'ci' => 'nullable|numeric'
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $tutor = Tutor::findOrFail($id);

        $estudiantes = Estudiante::orderBy('apellido')
            ->get();

        return view('tutores.edit', compact('tutor', 'estudiantes'));
    }

    public function update(Request $request, string $id)
    {
        $tutor = Tutor::findOrFail($id);

        $tutor->update($request->all());

        return redirect()
            ->route('tutores.index')
            ->with('success', 'Tutor actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $tutor = Tutor::findOrFail($id);

        $tutor->delete();

        return redirect()
            ->route('tutores.index')
            ->with('success', 'Tutor eliminado correctamente');
    }

    public function ver($id)
{
    $tutor = Tutor::with('estudiante')
        ->findOrFail($id);

    return view(
        'tutores.ver',
        compact('tutor')
    );
}

public function eliminados()
{
    $tutores = Tutor::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'tutores.eliminados',
        compact('tutores')
    );
}

public function restaurar($id)
{
    Tutor::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    return redirect()
        ->route('tutores.index')
        ->with(
            'success',
            'Tutor restaurado correctamente'
        );
}
}