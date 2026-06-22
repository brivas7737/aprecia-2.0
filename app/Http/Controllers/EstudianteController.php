<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Institucion;
use App\Models\NivelEducativo;
use App\Models\CondicionVisual;
use App\Models\Programa;
use App\Models\Servicio;
use App\Models\Paralelo;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
public function index(Request $request)
{
    $query = Estudiante::with([
        'institucion',
        'nivelEducativo',
        'condicionVisual',
        'programa',
        'servicio',
        'paralelo'
    ]);

    if ($request->filled('programa')) {

        $query->where(
            'programa_id',
            $request->programa
        );
    }

    if ($request->filled('servicio')) {

    $query->where(
        'servicio_id',
        $request->servicio
    );
}

    if ($request->filled('paralelo')) {

        $query->where(
            'paralelo_id',
            $request->paralelo
        );
    }

    if ($request->filled('condicion')) {

        $query->where(
            'condicion_visual_id',
            $request->condicion
        );
    }

    $estudiantes = $query
        ->orderBy('id')
        ->get();

    $programas =
        Programa::orderBy('nombre')
        ->get();

    $servicios =
    Servicio::orderBy('nombre')
    ->get();

    $paralelos =
        Paralelo::orderBy('nombre')
        ->get();

    $condiciones =
        CondicionVisual::orderBy('nombre')
        ->get();

    return view(
        'estudiantes.index',
        compact(
            'estudiantes',
            'programas',
            'servicios',
            'paralelos',
            'condiciones'
        )
    );
}

    public function create()
    {
        $instituciones = Institucion::orderBy('nombre')->get();
        $niveles = NivelEducativo::orderBy('nombre')->get();
        $condiciones = CondicionVisual::orderBy('nombre')->get();
        $programas = Programa::orderBy('nombre')->get();
        $servicios = Servicio::orderBy('nombre')->get();
        $paralelos = Paralelo::orderBy('nombre')->get();

        return view('estudiantes.create', compact(
            'instituciones',
            'niveles',
            'condiciones',
            'programas',
            'servicios',
            'paralelos'
        ));
    }

public function store(Request $request)
{
$request->validate(

[

    'correo' => 'nullable|email',

    'ci' => 'nullable|unique:estudiantes,ci'

],

[

    'correo.email' =>
        'Debe ingresar un correo válido.',

    'ci.unique' =>
        'Ya existe un estudiante registrado con este CI.'

]

);

    Estudiante::create($request->all());

    return redirect()
        ->route('estudiantes.index')
        ->with(
            'success',
            'Estudiante registrado correctamente'
        );
}
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $instituciones = Institucion::orderBy('nombre')->get();
        $niveles = NivelEducativo::orderBy('nombre')->get();
        $condiciones = CondicionVisual::orderBy('nombre')->get();
        $programas = Programa::orderBy('nombre')->get();
        $servicios = Servicio::orderBy('nombre')->get();
        $paralelos = Paralelo::orderBy('nombre')->get();

        return view('estudiantes.edit', compact(
            'estudiante',
            'instituciones',
            'niveles',
            'condiciones',
            'programas',
            'servicios',
            'paralelos'

        ));
    }

    public function update(Request $request, string $id)
    {
       $request->validate(

[

    'correo' => 'nullable|email',

    'ci' => 'nullable|unique:estudiantes,ci,' . $id

],

[

    'correo.email' =>
        'Debe ingresar un correo válido.',

    'ci.unique' =>
        'Ya existe un estudiante registrado con este CI.'

]

);

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $estudiante->delete();

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente');
    }

    public function ver($id)
{
    $estudiante = Estudiante::with([
        'institucion',
        'nivelEducativo',
        'condicionVisual',
        'programa',
        'servicio',
        'paralelo'
    ])->findOrFail($id);

    return view(
        'estudiantes.ver',
        compact('estudiante')
    );
    }

    public function eliminados()
{
    $estudiantes =
        Estudiante::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'estudiantes.eliminados',
        compact('estudiantes')
    );
}

public function restaurar($id)
{
    Estudiante::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    return redirect()
        ->route('estudiantes.index')
        ->with(
            'success',
            'Estudiante restaurado correctamente'
        );
}

public function eliminarDefinitivo($id)
{
    Estudiante::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('estudiantes.eliminados')
        ->with(
            'success',
            'Estudiante eliminado definitivamente'
        );
}
}