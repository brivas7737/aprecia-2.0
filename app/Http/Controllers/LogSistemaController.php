<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\LogSistema;

class LogSistemaController extends Controller
{
public function index(Request $request)
{
    $query = LogSistema::with('user');

    if ($request->filled('accion')) {

        $query->where(
            'accion',
            $request->accion
        );

    }

    if ($request->filled('modulo')) {

        $query->where(
            'modulo',
            $request->modulo
        );

    }

    $logs = $query
        ->orderBy('id', 'desc')
        ->get();

    return view(
        'logs.index',
        compact('logs')
    );
}
}