<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Helpers\LogHelper;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('id')->get();

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

Categoria::create($request->all());

LogHelper::registrar(
    'CREAR',
    'CATEGORIAS',
    'Se registró una categoría'
);

return redirect()
    ->route('categorias.index')
    ->with(
        'success',
        'Categoría registrada correctamente'
    );
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $categoria = Categoria::findOrFail($id);

$categoria->update($request->all());

LogHelper::registrar(
    'EDITAR',
    'CATEGORIAS',
    'Se actualizó una categoría'
);

return redirect()
    ->route('categorias.index')
    ->with(
        'success',
        'Categoría actualizada correctamente'
    );
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

$categoria->delete();

LogHelper::registrar(
    'ELIMINAR',
    'CATEGORIAS',
    'Se eliminó una categoría'
);

return redirect()
    ->route('categorias.index')
    ->with(
        'success',
        'Categoría eliminada correctamente'
    );
    }

    public function ver($id)
{
    $categoria = Categoria::findOrFail($id);

    return view(
        'categorias.ver',
        compact('categoria')
    );
}

public function eliminados()
{
    $categorias = Categoria::onlyTrashed()
        ->orderBy('id','desc')
        ->get();

    return view(
        'categorias.eliminados',
        compact('categorias')
    );
}

public function restaurar($id)
{
Categoria::onlyTrashed()
    ->findOrFail($id)
    ->restore();

LogHelper::registrar(
    'RESTAURAR',
    'CATEGORIAS',
    'Se restauró una categoría'
);

return redirect()
    ->route('categorias.index')
    ->with(
        'success',
        'Categoría restaurada correctamente'
    );

    return redirect()
        ->route('categorias.index')
        ->with(
            'success',
            'Categoría restaurada correctamente'
        );
}

public function eliminarDefinitivo($id)
{
    Categoria::onlyTrashed()
        ->findOrFail($id)
        ->forceDelete();

    return redirect()
        ->route('categorias.eliminados')
        ->with(
            'success',
            'Categoría eliminada definitivamente'
        );
}
}