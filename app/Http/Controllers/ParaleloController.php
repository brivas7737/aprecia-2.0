<?php

namespace App\Http\Controllers;

use App\Models\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{
    public function index()
    {
        $paralelos = Paralelo::orderBy('id')->get();

        return view(
            'paralelos.index',
            compact('paralelos')
        );
    }

    public function create()
    {
        return view('paralelos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Paralelo::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => true
        ]);

        return redirect()
            ->route('paralelos.index')
            ->with(
                'success',
                'Paralelo creado correctamente'
            );
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $paralelo = Paralelo::findOrFail($id);

        return view(
            'paralelos.edit',
            compact('paralelo')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $paralelo = Paralelo::findOrFail($id);

        $paralelo->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return redirect()
            ->route('paralelos.index')
            ->with(
                'success',
                'Paralelo actualizado correctamente'
            );
    }

    public function destroy(string $id)
    {
        $paralelo = Paralelo::findOrFail($id);

        $paralelo->delete();

        return redirect()
            ->route('paralelos.index')
            ->with(
                'success',
                'Paralelo eliminado correctamente'
            );
    }

    public function eliminados()
{
    $paralelos = Paralelo::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'paralelos.eliminados',
        compact('paralelos')
    );
}

public function restaurar($id)
{
    Paralelo::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    return redirect()
        ->route('paralelos.index')
        ->with(
            'success',
            'Paralelo restaurado correctamente'
        );
}

public function ver($id)
{
    $paralelo = Paralelo::findOrFail($id);

    return view(
        'paralelos.ver',
        compact('paralelo')
    );
}

public function eliminarDefinitivo($id)
{
    Paralelo::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('paralelos.eliminados')
        ->with(
            'success',
            'Paralelo eliminado definitivamente'
        );
}
}