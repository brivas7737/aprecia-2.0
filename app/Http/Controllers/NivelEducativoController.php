<?php

namespace App\Http\Controllers;

use App\Models\NivelEducativo;
use App\Helpers\LogHelper;
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
NivelEducativo::create($request->all());

LogHelper::registrar(
    'CREAR',
    'NIVELES EDUCATIVOS',
    'Se registró un nivel educativo'
);

return redirect()
    ->route('niveles-educativos.index')
    ->with(
        'success',
        'Nivel educativo registrado correctamente'
    );
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

$nivel->update($request->all());

LogHelper::registrar(
    'EDITAR',
    'NIVELES EDUCATIVOS',
    'Se actualizó un nivel educativo'
);

return redirect()
    ->route('niveles-educativos.index')
    ->with(
        'success',
        'Nivel educativo actualizado correctamente'
    );
}

    public function destroy(string $id)
    {
        $nivel = NivelEducativo::findOrFail($id);

$nivel->delete();

LogHelper::registrar(
    'ELIMINAR',
    'NIVELES EDUCATIVOS',
    'Se eliminó un nivel educativo'
);

return redirect()
    ->route('niveles-educativos.index')
    ->with(
        'success',
        'Nivel educativo eliminado correctamente'
    );
    }

    public function ver($id)
{
    $nivel = NivelEducativo::findOrFail($id);

    return view(
        'niveles_educativos.ver',
        compact('nivel')
    );
}

public function eliminados()
{
    $niveles = NivelEducativo::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'niveles_educativos.eliminados',
        compact('niveles')
    );
}

public function restaurar($id)
{
NivelEducativo::onlyTrashed()
    ->findOrFail($id)
    ->restore();

LogHelper::registrar(
    'RESTAURAR',
    'NIVELES EDUCATIVOS',
    'Se restauró un nivel educativo'
);

return redirect()
    ->route('niveles-educativos.index')
    ->with(
        'success',
        'Nivel educativo restaurado correctamente'
    );
}

public function eliminarDefinitivo($id)
{
    NivelEducativo::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('niveles-educativos.eliminados')
        ->with(
            'success',
            'Nivel educativo eliminado definitivamente'
        );
}
}