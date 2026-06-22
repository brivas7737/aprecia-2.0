<?php

namespace App\Http\Controllers;

use App\Models\CondicionVisual;
use Illuminate\Http\Request;

class CondicionVisualController extends Controller
{
    public function index()
    {
        $condiciones = CondicionVisual::orderBy('id')->get();

        return view('condiciones_visuales.index', compact('condiciones'));
    }

    public function create()
    {
        return view('condiciones_visuales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        CondicionVisual::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('condiciones-visuales.index')
            ->with('success', 'Condición visual creada correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $condicion = CondicionVisual::findOrFail($id);

        return view('condiciones_visuales.edit', compact('condicion'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $condicion = CondicionVisual::findOrFail($id);

        $condicion->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('condiciones-visuales.index')
            ->with('success', 'Condición visual actualizada correctamente');
    }

    public function destroy(string $id)
    {
        $condicion = CondicionVisual::findOrFail($id);

        $condicion->delete();

        return redirect()
            ->route('condiciones-visuales.index')
            ->with('success', 'Condición visual eliminada correctamente');
    }

    public function ver($id)
{
    $condicion = CondicionVisual::findOrFail($id);

    return view(
        'condiciones_visuales.ver',
        compact('condicion')
    );
}

public function eliminados()
{
    $condiciones = CondicionVisual::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'condiciones_visuales.eliminados',
        compact('condiciones')
    );
}

public function restaurar($id)
{
    CondicionVisual::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    return redirect()
        ->route('condiciones-visuales.index')
        ->with(
            'success',
            'Condición visual restaurada correctamente'
        );
}

public function eliminarDefinitivo($id)
{
    CondicionVisual::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('condiciones-visuales.eliminados')
        ->with(
            'success',
            'Condición visual eliminada definitivamente'
        );
}
}