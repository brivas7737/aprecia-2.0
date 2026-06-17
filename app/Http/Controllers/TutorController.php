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
}