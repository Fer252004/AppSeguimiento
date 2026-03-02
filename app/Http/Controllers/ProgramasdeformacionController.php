<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;

class ProgramasdeformacionController extends Controller
{
    public function index()
    {
        $programas = programasdeformacion::all();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        return view('programas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required'
        ]);

        programasdeformacion::create($request->all());
        return redirect()->route('programas.index')->with('success', 'Programa de formación creado exitosamente.');
    }

    public function show($id)
    {
        $programa = programasdeformacion::with('fichasCaracterizacion')->findOrFail($id);
        return view('programas.show', compact('programa'));
    }

    public function edit($id)
    {
        $programa = programasdeformacion::findOrFail($id);
        return view('programas.edit', compact('programa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required'
        ]);

        $programa = programasdeformacion::findOrFail($id);
        $programa->update($request->all());
        return redirect()->route('programas.index')->with('success', 'Programa de formación actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $programa = programasdeformacion::findOrFail($id);
        $programa->delete();
        return redirect()->route('programas.index')->with('success', 'Programa de formación eliminado exitosamente.');
    }
}
