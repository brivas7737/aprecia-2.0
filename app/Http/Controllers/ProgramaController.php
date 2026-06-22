<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::orderBy('id')->get();

        return view(
            'programas.index',
            compact('programas')
        );
    }

    public function create()
    {
        return view('programas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Programa::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => true
        ]);

        return redirect()
            ->route('programas.index')
            ->with(
                'success',
                'Programa creado correctamente'
            );
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $programa = Programa::findOrFail($id);

        return view(
            'programas.edit',
            compact('programa')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $programa = Programa::findOrFail($id);

        $programa->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return redirect()
            ->route('programas.index')
            ->with(
                'success',
                'Programa actualizado correctamente'
            );
    }

    public function destroy(string $id)
    {
        $programa = Programa::findOrFail($id);

        $programa->delete();

        return redirect()
            ->route('programas.index')
            ->with(
                'success',
                'Programa eliminado correctamente'
            );
    }

    public function eliminados()
{
    $programas = Programa::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'programas.eliminados',
        compact('programas')
    );
}

public function restaurar($id)
{
    Programa::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    return redirect()
        ->route('programas.index')
        ->with(
            'success',
            'Programa restaurado correctamente'
        );
}

public function ver($id)
{
    $programa = Programa::findOrFail($id);

    return view(
        'programas.ver',
        compact('programa')
    );
}

public function eliminarDefinitivo($id)
{
    Programa::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('programas.eliminados')
        ->with(
            'success',
            'Programa eliminado definitivamente'
        );
}
}