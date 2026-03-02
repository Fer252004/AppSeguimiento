<?php

namespace App\Http\Controllers;

use App\Models\instructores;
use App\Models\eps;
use App\Models\tiposdocumentos;
use App\Models\rolesadministrativos;
use Illuminate\Http\Request;

class InstructoresController extends Controller
{
    public function index()
    {
        $instructores = instructores::with('eps', 'tiposdocumentos', 'rolesadministrativos')->get();
        return view('instructores.index', compact('instructores'));
    }

    public function create()
    {
        $eps = eps::all();
        $tiposdocumentos = tiposdocumentos::all();
        $roles = rolesadministrativos::all();
        return view('instructores.create', compact('eps', 'tiposdocumentos', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Numdoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'CorreoInstitucional' => 'required|email',
            'Sexo' => 'required',
            'FechaNac' => 'required|date',
            'tbleps_NIS' => 'required|exists:tbleps,NIS',
            'tbltiposdocumentos_NIS' => 'required|exists:tbltiposdocumentos,NIS',
            'tblrolesadministrativos_NIS' => 'required|exists:tblrolesadministrativos,NIS'
        ]);

        instructores::create($request->all());
        return redirect()->route('instructores.index')->with('success', 'Instructor creado exitosamente.');
    }

    public function show($id)
    {
        $instructor = instructores::with('eps', 'tiposdocumentos', 'rolesadministrativos')->findOrFail($id);
        return view('instructores.show', compact('instructor'));
    }

    public function edit($id)
    {
        $instructor = instructores::findOrFail($id);
        $eps = eps::all();
        $tiposdocumentos = tiposdocumentos::all();
        $roles = rolesadministrativos::all();
        return view('instructores.edit', compact('instructor', 'eps', 'tiposdocumentos', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Numdoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'CorreoInstitucional' => 'required|email',
            'Sexo' => 'required',
            'FechaNac' => 'required|date',
            'tbleps_NIS' => 'required|exists:tbleps,NIS',
            'tbltiposdocumentos_NIS' => 'required|exists:tbltiposdocumentos,NIS',
            'tblrolesadministrativos_NIS' => 'required|exists:tblrolesadministrativos,NIS'
        ]);

        $instructor = instructores::findOrFail($id);
        $instructor->update($request->all());
        return redirect()->route('instructores.index')->with('success', 'Instructor actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $instructor = instructores::findOrFail($id);
        $instructor->delete();
        return redirect()->route('instructores.index')->with('success', 'Instructor eliminado exitosamente.');
    }
}
