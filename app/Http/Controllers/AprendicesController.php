<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aprendices;
use App\Models\Eps;
use App\Models\Tiposdocumentos;
use App\Models\Fichadecaracterizacion;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\AprendizRegistrado;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class AprendicesController extends Controller
{
    public function index()
    {
        $aprendices = aprendices::with(['eps', 'tiposdocumentos', 'fichadecaracterizacion'])->get();
        return view('aprendices.index', compact('aprendices'));
    }

    public function create()
    {
        $eps = Eps::all();
        $tiposdocumentos = Tiposdocumentos::all();
        $fichas = Fichadecaracterizacion::all();
        return view('aprendices.create', compact('eps', 'tiposdocumentos', 'fichas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Numdoc' => 'required|unique:tblaprendices,Numdoc',
            'Nombres' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'required|string|max:50',
            'CorreoInstitucional' => 'required|email|unique:tblaprendices,CorreoInstitucional|max:50',
            'CorreoPersonal' => 'required|email|max:50',
            'Sexo' => 'required|in:1,2',
            'FechaNac' => 'required|date',
            'tbleps_NIS' => 'required|exists:tbleps,NIS',
            'tbltiposdocumentos_NIS' => 'required|exists:tbltiposdocumentos,NIS',
            'tblfichadecaracterizacion_NIS' => 'required|exists:tblfichadecaracterizacion,NIS',
            'doc_anexo' => 'nullable|mimes:pdf|max:10240'
        ]);

        if (!File::exists(public_path('uploads/aprendices'))) {
            File::makeDirectory(public_path('uploads/aprendices'), 0755, true);
        }

        $data = $request->except('_token', 'doc_anexo');

        // Encriptar el nombre
        $data['Nombres'] = Crypt::encryptString($request->Nombres);

        if ($request->hasFile('doc_anexo')) {
            $nombre = 'anexo_' . $request->Numdoc . '_' . time() . '.pdf';
            $rutaDestino = public_path('uploads/aprendices');
            $request->file('doc_anexo')->move($rutaDestino, $nombre);
            $data['doc_anexo'] = 'uploads/aprendices/' . $nombre;
        }

        $aprendiz = aprendices::create($data);

        try {

            Mail::to([
                $aprendiz->CorreoPersonal
            ])->send(new AprendizRegistrado($aprendiz));



        } catch (\Exception $e) {
            Log::error('Error al enviar correo de registro: ' . $e->getMessage());
        }

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz creado correctamente.');
    }

    public function show($id)
    {
        $aprendiz = aprendices::with(['eps', 'tiposdocumentos', 'fichadecaracterizacion'])->findOrFail($id);
        return view('aprendices.show', compact('aprendiz'));
    }

    public function edit($id)
    {
        $aprendiz = aprendices::findOrFail($id);
        $eps = Eps::all();
        $tiposdocumentos = Tiposdocumentos::all();
        $fichas = Fichadecaracterizacion::all();
        return view('aprendices.edit', compact('aprendiz', 'eps', 'tiposdocumentos', 'fichas'));
    }

    public function update(Request $request, $id)
    {
        $aprendiz = aprendices::findOrFail($id);

        $validated = $request->validate([
            'Numdoc' => 'required|unique:tblaprendices,Numdoc,' . $id . ',NIS',
            'Nombres' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'required|string|max:50',
            'CorreoInstitucional' => 'required|email|unique:tblaprendices,CorreoInstitucional,' . $id . ',NIS|max:50',
            'CorreoPersonal' => 'required|email|max:50',
            'Sexo' => 'required|in:1,2',
            'FechaNac' => 'required|date',
            'tbleps_NIS' => 'required|exists:tbleps,NIS',
            'tbltiposdocumentos_NIS' => 'required|exists:tbltiposdocumentos,NIS',
            'tblfichadecaracterizacion_NIS' => 'required|exists:tblfichadecaracterizacion,NIS',
            'doc_anexo' => 'nullable|mimes:pdf|max:10240'
        ]);

        if (!File::exists(public_path('uploads/aprendices'))) {
            File::makeDirectory(public_path('uploads/aprendices'), 0755, true);
        }

        $data = $request->except('_token', '_method', 'doc_anexo');

        // Encriptar el nombre
        $data['Nombres'] = Crypt::encryptString($request->Nombres);

        if ($request->hasFile('doc_anexo')) {
            if ($aprendiz->doc_anexo && file_exists(public_path($aprendiz->doc_anexo))) {
                unlink(public_path($aprendiz->doc_anexo));
            }

            $nombre = 'anexo_' . $request->Numdoc . '_' . time() . '.pdf';
            $rutaDestino = public_path('uploads/aprendices');
            $request->file('doc_anexo')->move($rutaDestino, $nombre);
            $data['doc_anexo'] = 'uploads/aprendices/' . $nombre;
        }

        $aprendiz->update($data);

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy($id)
    {
        $aprendiz = aprendices::findOrFail($id);

        if ($aprendiz->doc_anexo && file_exists(public_path($aprendiz->doc_anexo))) {
            unlink(public_path($aprendiz->doc_anexo));
        }

        $aprendiz->delete();

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz eliminado correctamente.');
    }
}