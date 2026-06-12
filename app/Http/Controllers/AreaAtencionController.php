<?php

namespace App\Http\Controllers;

use App\Models\AreaAtencion;
use Illuminate\Http\Request;

class AreaAtencionController extends Controller
{
    public function index()
    {
        $areas = AreaAtencion::orderBy('id')->get();

        return view('areas_atencion.index', compact('areas'));
    }

    public function create()
    {
        return view('areas_atencion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        AreaAtencion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('areas-atencion.index')
            ->with('success', 'Área de atención creada correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $area = AreaAtencion::findOrFail($id);

        return view('areas_atencion.edit', compact('area'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $area = AreaAtencion::findOrFail($id);

        $area->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('areas-atencion.index')
            ->with('success', 'Área de atención actualizada correctamente');
    }

    public function destroy(string $id)
    {
        $area = AreaAtencion::findOrFail($id);

        $area->delete();

        return redirect()
            ->route('areas-atencion.index')
            ->with('success', 'Área de atención eliminada correctamente');
    }
}