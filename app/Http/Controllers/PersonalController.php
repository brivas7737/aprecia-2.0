<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Institucion;
use App\Models\Rol;
use App\Models\AreaAtencion;
use App\Helpers\LogHelper;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
public function index()
{
    $personal = Personal::with([
        'institucion',
        'rol',
        'areaAtencion'
    ])
    ->orderBy('id')
    ->get();

    return view('personal.index', compact('personal'));
}

public function create()
{
    $instituciones = Institucion::orderBy('nombre')->get();

    $roles = Rol::orderBy('nombre')->get();

    $areasAtencion = AreaAtencion::orderBy('nombre')->get();

    return view(
        'personal.create',
        compact(
            'instituciones',
            'roles',
            'areasAtencion'
        )
    );
}

public function store(Request $request)
{
    $request->validate(

    [

        'correo' => 'nullable|email',

        'ci' => 'nullable|unique:personal,ci'

    ],

    [

        'correo.email' =>
            'Debe ingresar un correo válido.',

        'ci.unique' =>
            'Ya existe una persona registrada con este CI.'

    ]

    );

Personal::create($request->all());

LogHelper::registrar(
    'CREAR',
    'PERSONAL',
    'Se registró personal'
);

return redirect()
    ->route('personal.index')
    ->with(
        'success',
        'Personal registrado correctamente'
    );
}

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $personal = Personal::findOrFail($id);

        $instituciones = Institucion::orderBy('nombre')->get();

        $roles = Rol::orderBy('nombre')->get();

        $areasAtencion = AreaAtencion::orderBy('nombre')->get();

        return view('personal.edit', compact(
            'personal',
            'instituciones',
            'roles',
            'areasAtencion'
        ));
    }

public function update(Request $request, string $id)
{
    $request->validate(

    [

        'correo' => 'nullable|email',

        'ci' => 'nullable|unique:personal,ci,' . $id

    ],

    [

        'correo.email' =>
            'Debe ingresar un correo válido.',

        'ci.unique' =>
            'Ya existe una persona registrada con este CI.'

    ]

    );

    $personal = Personal::findOrFail($id);

$personal->update($request->all());

LogHelper::registrar(
    'EDITAR',
    'PERSONAL',
    'Se actualizó personal'
);

return redirect()
    ->route('personal.index')
    ->with(
        'success',
        'Personal actualizado correctamente'
    );
}

    public function destroy(string $id)
    {
        $personal = Personal::findOrFail($id);

$personal->delete();

LogHelper::registrar(
    'ELIMINAR',
    'PERSONAL',
    'Se eliminó personal'
);

return redirect()
    ->route('personal.index')
    ->with(
        'success',
        'Personal eliminado correctamente'
    );
    }

    public function ver($id)
    {
        $personal = Personal::with(
            'institucion'
        )->findOrFail($id);

        return view(
            'personal.ver',
            compact('personal')
        );
    }

    public function eliminados()
    {
        $personal =
            Personal::onlyTrashed()
                ->orderBy('id', 'desc')
                ->get();

        return view(
            'personal.eliminados',
            compact('personal')
        );
    }

    public function restaurar($id)
    {
Personal::onlyTrashed()
    ->findOrFail($id)
    ->restore();

LogHelper::registrar(
    'RESTAURAR',
    'PERSONAL',
    'Se restauró personal'
);

return redirect()
    ->route('personal.index')
    ->with(
        'success',
        'Personal restaurado correctamente'
    );
    }

    public function eliminarDefinitivo($id)
{
    Personal::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('personal.eliminados')
        ->with(
            'success',
            'Personal eliminado definitivamente'
        );
}
}