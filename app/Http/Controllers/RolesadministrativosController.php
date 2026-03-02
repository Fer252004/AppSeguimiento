<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;

class RolesadministrativosController extends Controller
{
    public function index()
    {
        $roles = rolesadministrativos::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required'
        ]);

        rolesadministrativos::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol administrativo creado exitosamente.');
    }

    public function show($id)
    {
        $rol = rolesadministrativos::with('instructores')->findOrFail($id);
        return view('roles.show', compact('rol'));
    }

    public function edit($id)
    {
        $rol = rolesadministrativos::findOrFail($id);
        return view('roles.edit', compact('rol'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Descripcion' => 'required'
        ]);

        $rol = rolesadministrativos::findOrFail($id);
        $rol->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol administrativo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $rol = rolesadministrativos::findOrFail($id);
        $rol->delete();
        return redirect()->route('roles.index')->with('success', 'Rol administrativo eliminado exitosamente.');
    }
}
