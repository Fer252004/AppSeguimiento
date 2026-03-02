<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    public function index()
    {
        $eps = eps::all();
        return view('eps.index', compact('eps'));
    }

    public function create()
    {
        return view('eps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Numdoc' => 'required',
            'Denominacion' => 'required'
        ]);

        eps::create($request->all());
        return redirect()->route('eps.index')->with('success', 'EPS creada exitosamente.');
    }

    public function show($id)
    {
        $eps = eps::with('instructores', 'aprendices')->findOrFail($id);
        return view('eps.show', compact('eps'));
    }

    public function edit($id)
    {
        $eps = eps::findOrFail($id);
        return view('eps.edit', compact('eps'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Numdoc' => 'required',
            'Denominacion' => 'required'
        ]);

        $eps = eps::findOrFail($id);
        $eps->update($request->all());
        return redirect()->route('eps.index')->with('success', 'EPS actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $eps = eps::findOrFail($id);
        $eps->delete();
        return redirect()->route('eps.index')->with('success', 'EPS eliminada exitosamente.');
    }
}
