<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Helpers\LogHelper;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::orderBy('id')->get();

        return view(
            'roles.index',
            compact('roles')
        );
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

Rol::create($request->all());

LogHelper::registrar(
    'CREAR',
    'ROLES',
    'Se registró un rol'
);

return redirect()
    ->route('roles.index')
    ->with(
        'success',
        'Rol registrado correctamente'
    );
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $rol = Rol::findOrFail($id);

        return view(
            'roles.edit',
            compact('rol')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $rol = Rol::findOrFail($id);

        $rol->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

$rol->update($request->all());

LogHelper::registrar(
    'EDITAR',
    'ROLES',
    'Se actualizó un rol'
);

return redirect()
    ->route('roles.index')
    ->with(
        'success',
        'Rol actualizado correctamente'
    );
    }

    public function destroy(string $id)
    {
        $rol = Rol::findOrFail($id);

 $rol->delete();

LogHelper::registrar(
    'ELIMINAR',
    'ROLES',
    'Se eliminó un rol'
);

return redirect()
    ->route('roles.index')
    ->with(
        'success',
        'Rol eliminado correctamente'
    );
    }

    public function ver($id)
    {
        $rol = Rol::findOrFail($id);

        return view(
            'roles.ver',
            compact('rol')
        );
    }

    public function eliminados()
    {
        $roles = Rol::onlyTrashed()
            ->orderBy('id','desc')
            ->get();

        return view(
            'roles.eliminados',
            compact('roles')
        );
    }

    public function restaurar($id)
    {
Rol::onlyTrashed()
    ->findOrFail($id)
    ->restore();

LogHelper::registrar(
    'RESTAURAR',
    'ROLES',
    'Se restauró un rol'
);

return redirect()
    ->route('roles.index')
    ->with(
        'success',
        'Rol restaurado correctamente'
    );
    }

    public function eliminarDefinitivo($id)
{
    Rol::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('roles.eliminados')
        ->with(
            'success',
            'Rol eliminado definitivamente'
        );
}
}