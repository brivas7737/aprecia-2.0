<?php

namespace App\Http\Controllers;
use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function index()
    {
        $instituciones = Institucion::latest()->paginate(10);

        return view('instituciones.index', compact('instituciones'));
    }

    public function create()
    {
        return view('instituciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:150',
        ]);

        Institucion::create($request->all());

        return redirect()
            ->route('instituciones.index')
            ->with('success', 'Institución creada correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $institucion = Institucion::findOrFail($id);

        return view('instituciones.edit', compact('institucion'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
        ]);

        $institucion = Institucion::findOrFail($id);

        $institucion->update($request->all());

        return redirect()
            ->route('instituciones.index')
            ->with('success', 'Institución actualizada correctamente');
    }

    public function destroy(string $id)
    {
        $institucion = Institucion::findOrFail($id);

        $institucion->delete();

        return redirect()
            ->route('instituciones.index')
            ->with('success', 'Institución eliminada correctamente');
    }
}
