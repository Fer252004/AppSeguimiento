<?php

namespace App\Http\Controllers;

use App\Models\fichadecaracterizacion;
use App\Models\programasdeformacion;
use App\Models\centrodeformacion;
use Illuminate\Http\Request;

class FichadecaracterizacionController extends Controller
{
    public function index()
    {
        $fichas = fichadecaracterizacion::with('programasdeformacion', 'centrodeformacion')->get();
        return view('fichas.index', compact('fichas'));
    }

    public function create()
    {
        $programas = programasdeformacion::all();
        $centros = centrodeformacion::all();
        return view('fichas.create', compact('programas', 'centros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Cupo' => 'required|integer',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date|after:FechaInicio',
            'tblprogramasdeformacion_NIS' => 'required|exists:tblprogramasdeformacion,NIS',
            'tblcentrodeformacion_NIS' => 'required|exists:tblcentrodeformacion,NIS'
        ]);

        fichadecaracterizacion::create($request->all());
        return redirect()->route('fichas.index')->with('success', 'Ficha de caracterización creada exitosamente.');
    }

    public function show($id)
    {
        $ficha = fichadecaracterizacion::with('programasdeformacion', 'centrodeformacion', 'aprendices')->findOrFail($id);
        return view('fichas.show', compact('ficha'));
    }

    public function edit($id)
    {
        $ficha = fichadecaracterizacion::findOrFail($id);
        $programas = programasdeformacion::all();
        $centros = centrodeformacion::all();
        return view('fichas.edit', compact('ficha', 'programas', 'centros'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Cupo' => 'required|integer',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date|after:FechaInicio',
            'tblprogramasdeformacion_NIS' => 'required|exists:tblprogramasdeformacion,NIS',
            'tblcentrodeformacion_NIS' => 'required|exists:tblcentrodeformacion,NIS'
        ]);

        $ficha = fichadecaracterizacion::findOrFail($id);
        $ficha->update($request->all());
        return redirect()->route('fichas.index')->with('success', 'Ficha de caracterización actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $ficha = fichadecaracterizacion::findOrFail($id);
        $ficha->delete();
        return redirect()->route('fichas.index')->with('success', 'Ficha de caracterización eliminada exitosamente.');
    }
}
