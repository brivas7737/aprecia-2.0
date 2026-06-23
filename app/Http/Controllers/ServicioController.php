<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Helpers\LogHelper;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::orderBy('id')->get();

        return view(
            'servicios.index',
            compact('servicios')
        );
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Servicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => true
        ]);

Servicio::create($request->all());

LogHelper::registrar(
    'CREAR',
    'SERVICIOS',
    'Se registró un servicio'
);

return redirect()
    ->route('servicios.index')
    ->with(
        'success',
        'Servicio registrado correctamente'
    );
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $servicio = Servicio::findOrFail($id);

        return view(
            'servicios.edit',
            compact('servicio')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $servicio = Servicio::findOrFail($id);

        $servicio->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

$servicio->update($request->all());

LogHelper::registrar(
    'EDITAR',
    'SERVICIOS',
    'Se actualizó un servicio'
);

return redirect()
    ->route('servicios.index')
    ->with(
        'success',
        'Servicio actualizado correctamente'
    );
    }

    public function destroy(string $id)
    {
        $servicio = Servicio::findOrFail($id);

$servicio->delete();

LogHelper::registrar(
    'ELIMINAR',
    'SERVICIOS',
    'Se eliminó un servicio'
);

return redirect()
    ->route('servicios.index')
    ->with(
        'success',
        'Servicio eliminado correctamente'
    );
    }

    public function eliminados()
{
    $servicios = Servicio::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'servicios.eliminados',
        compact('servicios')
    );
}

public function restaurar($id)
{
Servicio::onlyTrashed()
    ->findOrFail($id)
    ->restore();

LogHelper::registrar(
    'RESTAURAR',
    'SERVICIOS',
    'Se restauró un servicio'
);

return redirect()
    ->route('servicios.index')
    ->with(
        'success',
        'Servicio restaurado correctamente'
    );

}

public function ver($id)
{
    $servicio = Servicio::findOrFail($id);

    return view(
        'servicios.ver',
        compact('servicio')
    );
}

public function eliminarDefinitivo($id)
{
    Servicio::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('servicios.eliminados')
        ->with(
            'success',
            'Servicio eliminado definitivamente'
        );
}
}