<?php

namespace App\Http\Controllers;

use App\Models\NivelEducativo;
use Illuminate\Http\Request;

class NivelEducativoController extends Controller
{
public function index()
{
    $niveles = NivelEducativo::orderBy('id', 'asc')->get();

    return view('niveles_educativos.index', compact('niveles'));
}

    public function create()
    {
        return view('niveles_educativos.create');
    }

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:100',
    ]);

    NivelEducativo::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
    ]);

    return redirect()
        ->route('niveles-educativos.index')
        ->with('success', 'Nivel educativo creado correctamente');
}

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $nivel = NivelEducativo::findOrFail($id);

        return view('niveles_educativos.edit', compact('nivel'));
    }

public function update(Request $request, string $id)
{
    $request->validate([
        'nombre' => 'required|max:100',
    ]);

    $nivel = NivelEducativo::findOrFail($id);

    $nivel->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
    ]);

    return redirect()
        ->route('niveles-educativos.index')
        ->with('success', 'Nivel educativo actualizado correctamente');
}

    public function destroy(string $id)
    {
        $nivel = NivelEducativo::findOrFail($id);

        $nivel->delete();

        return redirect()
            ->route('niveles-educativos.index')
            ->with('success', 'Nivel educativo eliminado correctamente');
    }
}