<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Institucion;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::with('institucion')
            ->orderBy('id')
            ->get();

        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        $instituciones = Institucion::orderBy('nombre')->get();

        return view('personal.create', compact('instituciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'correo' => 'nullable|email',
            'ci' => 'nullable|numeric'
        ]);

        Personal::create($request->all());

        return redirect()
            ->route('personal.index')
            ->with('success', 'Personal registrado correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $personal = Personal::findOrFail($id);

        $instituciones = Institucion::orderBy('nombre')->get();

        return view('personal.edit', compact(
            'personal',
            'instituciones'
        ));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'correo' => 'nullable|email',
            'ci' => 'nullable|numeric'
        ]);

        $personal = Personal::findOrFail($id);

        $personal->update($request->all());

        return redirect()
            ->route('personal.index')
            ->with('success', 'Personal actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $personal = Personal::findOrFail($id);

        $personal->delete();

        return redirect()
            ->route('personal.index')
            ->with('success', 'Personal eliminado correctamente');
    }

    public function ver($id)
    {
        $personal = Personal::with(
            'institucion'
        )->findOrFail($id);

        return view(
            'personal.ver',
            compact('personal')
        );
    }

    public function eliminados()
    {
        $personal =
            Personal::onlyTrashed()
                ->orderBy('id', 'desc')
                ->get();

        return view(
            'personal.eliminados',
            compact('personal')
        );
    }

    public function restaurar($id)
    {
        Personal::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect()
            ->route('personal.index')
            ->with(
                'success',
                'Registro restaurado correctamente'
            );
    }
}