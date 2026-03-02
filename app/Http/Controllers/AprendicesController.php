<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aprendices;
use App\Models\Eps;
use App\Models\Tiposdocumentos;
use App\Models\Fichadecaracterizacion;
use Illuminate\Support\Facades\File;

class AprendicesController extends Controller
{
    // Mostrar todos los aprendices
    public function index()
    {
        $aprendices = aprendices::with(['eps', 'tiposdocumentos', 'fichadecaracterizacion'])->get();
        return view('aprendices.index', compact('aprendices'));
    }

    // Mostrar formulario para crear un aprendiz
    public function create()
    {
        $eps = Eps::all();
        $tiposdocumentos = Tiposdocumentos::all();
        $fichas = Fichadecaracterizacion::all();
        return view('aprendices.create', compact('eps', 'tiposdocumentos', 'fichas'));
    }

    // Guardar un aprendiz nuevo
    public function store(Request $request)
    {
        // Validar
        $request->validate([
            'Numdoc' => 'required|unique:tblaprendices',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email|unique:tblaprendices',
            'CorreoPersonal' => 'required|email',
            'Sexo' => 'required',
            'FechaNac' => 'required|date',
            'tbleps_NIS' => 'required',
            'tbltiposdocumentos_NIS' => 'required',
            'tblfichadecaracterizacion_NIS' => 'required',
            'doc_anexo' => 'nullable|mimes:pdf|max:10240'
        ]);

        // Crear carpeta si no existe
        if (!File::exists(public_path('uploads/aprendices'))) {
            File::makeDirectory(public_path('uploads/aprendices'), 0755, true);
        }

        // Preparar datos
        $data = $request->except('_token', 'doc_anexo');

        $data['Nombres'] = bcrypt($request->Nombres);

        // Subir PDF si viene
        if ($request->hasFile('doc_anexo')) {
            $nombre = 'anexo_' . $request->Numdoc . '_' . time() . '.pdf';


            $rutaDestino = public_path('uploads/aprendices');
            $request->file('doc_anexo')->move($rutaDestino, $nombre);

            // Guardar la ruta relativa para la base de datos
            $data['doc_anexo'] = '/uploads/aprendices/' . $nombre;
        }

        // Guardar
        aprendices::create($data);

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz creado correctamente.');
    }

    // Mostrar un aprendiz específico
    public function show($id)
    {
        $aprendiz = aprendices::with(['eps', 'tiposdocumentos', 'fichadecaracterizacion'])->findOrFail($id);
        return view('aprendices.show', compact('aprendiz'));
    }

    // Mostrar formulario para editar un aprendiz
    public function edit($id)
    {
        $aprendiz = aprendices::findOrFail($id);
        $eps = Eps::all();
        $tiposdocumentos = Tiposdocumentos::all();
        $fichas = Fichadecaracterizacion::all();
        return view('aprendices.edit', compact('aprendiz', 'eps', 'tiposdocumentos', 'fichas'));
    }

    // Actualizar aprendiz
    public function update(Request $request, $id)
    {
        $aprendiz = aprendices::findOrFail($id);

        // Validar
        $request->validate([
            'Numdoc' => 'required|unique:tblaprendices,Numdoc,' . $id . ',NIS',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email|unique:tblaprendices,CorreoInstitucional,' . $id . ',NIS',
            'CorreoPersonal' => 'required|email',
            'Sexo' => 'required',
            'FechaNac' => 'required|date',
            'tbleps_NIS' => 'required',
            'tbltiposdocumentos_NIS' => 'required',
            'tblfichadecaracterizacion_NIS' => 'required',
            'doc_anexo' => 'nullable|mimes:pdf|max:10240'
        ]);

        // Crear carpeta si no existe
        if (!File::exists(public_path('uploads/aprendices'))) {
            File::makeDirectory(public_path('uploads/aprendices'), 0755, true);
        }

        // Preparar datos
        $data = $request->except('_token', '_method', 'doc_anexo');

        $data['Nombres'] = bcrypt($request->Nombres);

        // Subir nuevo PDF si viene
        if ($request->hasFile('doc_anexo')) {
            $nombre = 'anexo_' . $request->Numdoc . '_' . time() . '.pdf';


            $rutaDestino = public_path('uploads/aprendices');
            $request->file('doc_anexo')->move($rutaDestino, $nombre);

            // Guardar la ruta relativa para la base de datos
            $data['doc_anexo'] = '/uploads/aprendices/' . $nombre;
        }

        // Actualizar
        $aprendiz->update($data);

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz actualizado correctamente.');
    }

    // Eliminar aprendiz
    public function destroy($id)
    {
        $aprendiz = aprendices::findOrFail($id);

        // Eliminar PDF si existe
        if ($aprendiz->doc_anexo && file_exists(public_path($aprendiz->doc_anexo))) {
            unlink(public_path($aprendiz->doc_anexo));
        }

        $aprendiz->delete();

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz eliminado correctamente.');
    }
}
