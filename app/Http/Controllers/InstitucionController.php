<?php

namespace App\Http\Controllers;
use App\Models\Institucion;
use Illuminate\Http\Request;
use App\Helpers\LogHelper;

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

        LogHelper::registrar(
            'CREAR',
            'INSTITUCIONES',
            'Se registró una institución'
        );

        return redirect()
            ->route('instituciones.index')
            ->with(
                'success',
                'Institución registrada correctamente'
            );
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

        LogHelper::registrar(
            'EDITAR',
            'INSTITUCIONES',
            'Se actualizó una institución'
        );

        return redirect()
            ->route('instituciones.index')
            ->with(
                'success',
                'Institución actualizada correctamente'
            );
    }

    public function destroy(string $id)
    {
        $institucion = Institucion::findOrFail($id);

        $institucion->delete();

        LogHelper::registrar(
            'ELIMINAR',
            'INSTITUCIONES',
            'Se eliminó una institución'
        );

        return redirect()
            ->route('instituciones.index')
            ->with(
                'success',
                'Institución eliminada correctamente'
            );
    }

    public function ver($id)
    {
        $institucion = Institucion::findOrFail($id);

        return view(
            'instituciones.ver',
            compact('institucion')
        );
    }

    public function eliminados()
    {
        $instituciones = Institucion::onlyTrashed()
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'instituciones.eliminados',
            compact('instituciones')
        );
    }

    public function restaurar($id)
    {
        Institucion::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        LogHelper::registrar(
            'RESTAURAR',
            'INSTITUCIONES',
            'Se restauró una institución'
        );

        return redirect()
            ->route('instituciones.index')
            ->with(
                'success',
                'Institución restaurada correctamente'
            );
    }

    public function eliminarDefinitivo($id)
    {
        Institucion::onlyTrashed()
            ->findOrFail($id)
            ->forceDelete();

        return redirect()
            ->route('instituciones.eliminados')
            ->with(
                'success',
                'Institución eliminada definitivamente'
            );
    }
}
