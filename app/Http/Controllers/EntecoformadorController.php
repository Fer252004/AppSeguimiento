<?php

namespace App\Http\Controllers;

use App\Models\entecoformador;
use Illuminate\Http\Request;

class EntecoformadorController extends Controller
{
    public function index()
    {
        $entes = entecoformador::all();
        return view('entes.index', compact('entes'));
    }

    public function create()
    {
        return view('entes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tdoc' => 'required',
            'Numdoc' => 'required',
            'RazonSocial' => 'required',
            'CorreoInstitucional' => 'required|email'
        ]);

        entecoformador::create($request->all());
        return redirect()->route('entes.index')->with('success', 'Ente coformador creado exitosamente.');
    }

    public function show($id)
    {
        $ente = entecoformador::with('aprendices')->findOrFail($id);
        return view('entes.show', compact('ente'));
    }

    public function edit($id)
    {
        $ente = entecoformador::findOrFail($id);
        return view('entes.edit', compact('ente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Tdoc' => 'required',
            'Numdoc' => 'required',
            'RazonSocial' => 'required',
            'CorreoInstitucional' => 'required|email'
        ]);

        $ente = entecoformador::findOrFail($id);
        $ente->update($request->all());
        return redirect()->route('entes.index')->with('success', 'Ente coformador actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $ente = entecoformador::findOrFail($id);
        $ente->delete();
        return redirect()->route('entes.index')->with('success', 'Ente coformador eliminado exitosamente.');
    }
}
