<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4><i class="fa-solid fa-user-edit"></i> Editar Aprendiz</h4>
        </div>
        <div class="card-body">

            {{-- Mostrar errores --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('aprendices.update', $aprendiz->NIS) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">

                    {{-- Tipo Documento --}}
                    <div class="col-md-4">
                        <label for="tbltiposdocumentos_NIS" class="form-label">Tipo Documento</label>
                        <select name="tbltiposdocumentos_NIS" id="tbltiposdocumentos_NIS" class="form-select" required>
                            @foreach($tiposdocumentos as $tipo)
                                <option value="{{ $tipo->NIS }}" {{ old('tbltiposdocumentos_NIS', $aprendiz->tbltiposdocumentos_NIS) == $tipo->NIS ? 'selected' : '' }}>
                                    {{ $tipo->Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Número Documento --}}
                    <div class="col-md-4">
                        <label for="Numdoc" class="form-label">Número Documento</label>
                        <input type="text" name="Numdoc" id="Numdoc" class="form-control" value="{{ old('Numdoc', $aprendiz->Numdoc) }}" required>
                    </div>

                    {{-- EPS --}}
                    <div class="col-md-4">
                        <label for="tbleps_NIS" class="form-label">EPS</label>
                        <select name="tbleps_NIS" id="tbleps_NIS" class="form-select" required>
                            @foreach($eps as $e)
                                <option value="{{ $e->NIS }}" {{ old('tbleps_NIS', $aprendiz->tbleps_NIS) == $e->NIS ? 'selected' : '' }}>
                                    {{ $e->Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Nombres --}}
                    <div class="col-md-6">
                        <label for="Nombres" class="form-label">Nombres</label>
                        <input type="text" name="Nombres" id="Nombres" class="form-control" value="{{ old('Nombres', $aprendiz->Nombres) }}" required>
                    </div>

                    {{-- Apellidos --}}
                    <div class="col-md-6">
                        <label for="Apellidos" class="form-label">Apellidos</label>
                        <input type="text" name="Apellidos" id="Apellidos" class="form-control" value="{{ old('Apellidos', $aprendiz->Apellidos) }}" required>
                    </div>

                    {{-- Dirección --}}
                    <div class="col-md-6">
                        <label for="Direccion" class="form-label">Dirección</label>
                        <input type="text" name="Direccion" id="Direccion" class="form-control" value="{{ old('Direccion', $aprendiz->Direccion) }}" required>
                    </div>

                    {{-- Teléfono --}}
                    <div class="col-md-6">
                        <label for="Telefono" class="form-label">Teléfono</label>
                        <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{ old('Telefono', $aprendiz->Telefono) }}">
                    </div>

                    {{-- Correo Institucional --}}
                    <div class="col-md-6">
                        <label for="CorreoInstitucional" class="form-label">Correo Institucional</label>
                        <input type="email" name="CorreoInstitucional" id="CorreoInstitucional" class="form-control" value="{{ old('CorreoInstitucional', $aprendiz->CorreoInstitucional) }}" required>
                    </div>

                    {{-- Correo Personal --}}
                    <div class="col-md-6">
                        <label for="CorreoPersonal" class="form-label">Correo Personal</label>
                        <input type="email" name="CorreoPersonal" id="CorreoPersonal" class="form-control" value="{{ old('CorreoPersonal', $aprendiz->CorreoPersonal) }}" required>
                    </div>

                    {{-- Sexo --}}
                    <div class="col-md-4">
                        <label for="Sexo" class="form-label">Sexo</label>
                        <select name="Sexo" id="Sexo" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <option value="1" {{ old('Sexo', $aprendiz->Sexo) == 1 ? 'selected' : '' }}>Masculino</option>
                            <option value="2" {{ old('Sexo', $aprendiz->Sexo) == 2 ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>

                    {{-- Fecha de Nacimiento --}}
                    <div class="col-md-4">
                        <label for="FechaNac" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="FechaNac" id="FechaNac" class="form-control" value="{{ old('FechaNac', $aprendiz->FechaNac) }}" required>
                    </div>

                    {{-- Ficha de Caracterización --}}
                    <div class="col-md-4">
                        <label for="tblfichadecaracterizacion_NIS" class="form-label">Ficha de Caracterización</label>
                        <select name="tblfichadecaracterizacion_NIS" id="tblfichadecaracterizacion_NIS" class="form-select" required>
                            @foreach($fichas as $f)
                                <option value="{{ $f->NIS }}" {{ old('tblfichadecaracterizacion_NIS', $aprendiz->tblfichadecaracterizacion_NIS) == $f->NIS ? 'selected' : '' }}>
                                    {{ $f->Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Documento Anexo --}}
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label for="doc_anexo" class="form-label">Documento Anexo (PDF)</label>

                            @if($aprendiz->doc_anexo)
                                <div class="mb-2 p-2 border rounded bg-light">
                                    <strong>PDF actual:</strong>
                                    <a href="{{ asset($aprendiz->doc_anexo) }}" target="_blank" class="btn btn-sm btn-info">
                                        <i class="fa-solid fa-file-pdf"></i> Ver PDF
                                    </a>
                                    <small class="text-muted ms-2">{{ basename($aprendiz->doc_anexo) }}</small>
                                </div>
                            @endif

                            <div class="input-group">
                                <input type="file" name="doc_anexo" id="doc_anexo" class="form-control" accept=".pdf">
                            </div>
                            <small class="text-muted d-block mt-1">
                                Máximo 10MB. Solo archivos PDF.
                                @if($aprendiz->doc_anexo)
                                    <span class="text-warning">Si subes uno nuevo, reemplazará el actual.</span>
                                @endif
                            </small>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa-solid fa-save"></i> Actualizar
                    </button>
                    <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-times"></i> Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
