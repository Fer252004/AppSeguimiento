<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle Aprendiz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><i class="fa-solid fa-user"></i> Detalle del Aprendiz</h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 200px;">NIS</th>
                            <td>{{ $aprendiz->NIS }}</td>
                        </tr>
                        <tr>
                            <th>Tipo Documento</th>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $aprendiz->tiposdocumentos?->Denominacion ?? 'No asignado' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Número Documento</th>
                            <td>{{ $aprendiz->Numdoc }}</td>
                        </tr>
                        <tr>
                            <th>Nombres</th>
                            <td>{{ $aprendiz->Nombres }}</td>
                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td>{{ $aprendiz->Apellidos }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $aprendiz->Direccion }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td>{{ $aprendiz->Telefono ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Correo Institucional</th>
                            <td>{{ $aprendiz->CorreoInstitucional }}</td>
                        </tr>
                        <tr>
                            <th>Correo Personal</th>
                            <td>{{ $aprendiz->CorreoPersonal }}</td>
                        </tr>
                        <tr>
                            <th>Sexo</th>
                            <td>
                                @if($aprendiz->Sexo == 1)
                                    <span class="badge bg-primary">Masculino</span>
                                @elseif($aprendiz->Sexo == 2)
                                    <span class="badge bg-danger">Femenino</span>
                                @else
                                    <span class="badge bg-secondary">Otro</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha Nacimiento</th>
                            <td>{{ \Carbon\Carbon::parse($aprendiz->FechaNac)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>EPS</th>
                            <td>
                                <span class="badge bg-success">
                                    {{ $aprendiz->eps?->Denominacion ?? 'No asignada' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Ficha</th>
                            <td>
                                <span class="badge bg-warning text-dark">
                                    {{ $aprendiz->fichadecaracterizacion?->Denominacion ?? 'No asignada' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Documento Anexo</th>
                            <td>
                                @if($aprendiz->doc_anexo)
                                    <a href="{{ asset($aprendiz->doc_anexo) }}"
                                       target="_blank"
                                       class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-file-pdf"></i>
                                        Ver PDF
                                    </a>
                                    <small class="text-muted d-block mt-1">
                                        {{ basename($aprendiz->doc_anexo) }}
                                    </small>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="fa-solid fa-ban"></i>
                                        Sin documento
                                    </span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Volver
                        </a>
                        <a href="{{ route('aprendices.edit', $aprendiz->NIS) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
