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
    $request->validate(

    [

        'correo' => 'nullable|email',

        'ci' => 'nullable|unique:tutores,ci'

    ],

    [

        'correo.email' =>
            'Debe ingresar un correo válido.',

        'ci.unique' =>
            'Ya existe un tutor registrado con este CI.'

    ]

    );

    Tutor::create($request->all());

    return redirect()
        ->route('tutores.index')
        ->with(
            'success',
            'Tutor registrado correctamente'
        );
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
    $request->validate(

    [

        'correo' => 'nullable|email',

        'ci' => 'nullable|unique:tutores,ci,' . $id

    ],

    [

        'correo.email' =>
            'Debe ingresar un correo válido.',

        'ci.unique' =>
            'Ya existe un tutor registrado con este CI.'

    ]

    );

    $tutor = Tutor::findOrFail($id);

    $tutor->update($request->all());

    return redirect()
        ->route('tutores.index')
        ->with(
            'success',
            'Tutor actualizado correctamente'
        );
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

public function eliminarDefinitivo($id)
{
    Tutor::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('tutores.eliminados')
        ->with(
            'success',
            'Tutor eliminado definitivamente'
        );
}
}