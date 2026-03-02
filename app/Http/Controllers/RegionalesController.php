<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\regionales;

class RegionalesController extends Controller
{
    // Mostrar todas las regionales
    public function index()
    {
        $regionales = regionales::with('centrosFormacion')->get();
        return view('regionales.index', compact('regionales'));
    }

    // Mostrar formulario para crear una regional
    public function create()
    {
        return view('regionales.create');
    }

    // Guardar una regional nueva
    public function store(Request $request)
    {
        // Validar
        $request->validate([
            'Codigo' => 'required|integer|unique:tblregionales,Codigo',
            'Denominacion' => 'required|string|max:100',
            'Observaciones' => 'nullable|string|max:200',
        ]);

        // Guardar
        regionales::create($request->all());

        return redirect()->route('regionales.index')->with('success', 'Regional creada correctamente.');
    }

    // Mostrar una regional específica
    public function show($id)
    {
        $regional = regionales::with('centrosFormacion')->findOrFail($id);
        return view('regionales.show', compact('regional'));
    }

    // Mostrar formulario para editar una regional
    public function edit($id)
    {
        $regional = regionales::findOrFail($id);
        return view('regionales.edit', compact('regional'));
    }

    // Actualizar regional
    public function update(Request $request, $id)
    {
        $regional = regionales::findOrFail($id);

        // Validar - excluyendo el registro actual
        $request->validate([
            'Denominacion' => 'required|string|max:100',
            'Observaciones' => 'nullable|string|max:200',
        ]);

        // Actualizar
        $regional->update($request->all());

        return redirect()->route('regionales.index')->with('success', 'Regional actualizada correctamente.');
    }

    // Eliminar regional
    public function destroy($id)
    {
        $regional = regionales::findOrFail($id);
        $regional->delete();
        return redirect()->route('regionales.index')->with('success', 'Regional eliminada correctamente.');
    }
}
