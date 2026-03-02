<?php

namespace App\Http\Controllers;

use App\Models\centrodeformacion;
use App\Models\regionales;
use Illuminate\Http\Request;

class CentrodeformacionController extends Controller
{
    public function index()
    {
        $centros = centrodeformacion::with('regionales')->get();
        return view('centros.index', compact('centros'));
    }

    public function create()
    {
        $regionales = regionales::all();
        return view('centros.create', compact('regionales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'tblregionales_NIS' => 'required|exists:tblregionales,NIS'
        ]);

        centrodeformacion::create($request->all());
        return redirect()->route('centros.index')->with('success', 'Centro de formación creado exitosamente.');
    }

    public function show($id)
    {
        $centro = centrodeformacion::with('regionales', 'fichasCaracterizacion')->findOrFail($id);
        return view('centros.show', compact('centro'));
    }

    public function edit($id)
    {
        $centro = centrodeformacion::findOrFail($id);
        $regionales = regionales::all();
        return view('centros.edit', compact('centro', 'regionales'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'tblregionales_NIS' => 'required|exists:tblregionales,NIS'
        ]);

        $centro = centrodeformacion::findOrFail($id);
        $centro->update($request->all());
        return redirect()->route('centros.index')->with('success', 'Centro de formación actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $centro = centrodeformacion::findOrFail($id);
        $centro->delete();
        return redirect()->route('centros.index')->with('success', 'Centro de formación eliminado exitosamente.');
    }
}
