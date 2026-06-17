<?php

namespace App\Http\Controllers;

use App\Models\ProgramaServicio;
use Illuminate\Http\Request;

class ProgramaServicioController extends Controller
{
    public function index()
    {
        $programas = ProgramaServicio::orderBy('id')->get();

        return view('programas_servicios.index', compact('programas'));
    }

    public function create()
    {
        return view('programas_servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:150',
        ]);

        ProgramaServicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado ?? true,
        ]);

        return redirect()
            ->route('programas-servicios.index')
            ->with('success', 'Programa o servicio creado correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $programa = ProgramaServicio::findOrFail($id);

        return view('programas_servicios.edit', compact('programa'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
        ]);

        $programa = ProgramaServicio::findOrFail($id);

        $programa->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado ?? true,
        ]);

        return redirect()
            ->route('programas-servicios.index')
            ->with('success', 'Programa o servicio actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $programa = ProgramaServicio::findOrFail($id);

        $programa->delete();

        return redirect()
            ->route('programas-servicios.index')
            ->with('success', 'Programa o servicio eliminado correctamente');
    }
}