<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class TiposdocumentosController extends Controller
{
    public function index()
    {
        $tipos = tiposdocumentos::all();
        return view('tiposdocumentos.index', compact('tipos'));
    }

    public function create()
    {
        return view('tiposdocumentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Denominacion' => 'required'
        ]);

        tiposdocumentos::create($request->all());
        return redirect()->route('tiposdocumentos.index')->with('success', 'Tipo de documento creado exitosamente.');
    }

    public function show($id)
    {
        $tipo = tiposdocumentos::with('aprendices', 'instructores')->findOrFail($id);
        return view('tiposdocumentos.show', compact('tipo'));
    }

    public function edit($id)
    {
        $tipo = tiposdocumentos::findOrFail($id);
        return view('tiposdocumentos.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Denominacion' => 'required'
        ]);

        $tipo = tiposdocumentos::findOrFail($id);
        $tipo->update($request->all());
        return redirect()->route('tiposdocumentos.index')->with('success', 'Tipo de documento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $tipo = tiposdocumentos::findOrFail($id);
        $tipo->delete();
        return redirect()->route('tiposdocumentos.index')->with('success', 'Tipo de documento eliminado exitosamente.');
    }
}
