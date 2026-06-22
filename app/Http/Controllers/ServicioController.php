<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
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

        return redirect()
            ->route('servicios.index')
            ->with(
                'success',
                'Servicio creado correctamente'
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
}