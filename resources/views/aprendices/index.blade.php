<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Aprendices</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Aprendices</h2>

        <a href="{{ route('aprendices.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Nuevo Aprendiz
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg-white shadow-sm text-center align-middle">

            <thead class="table-dark">
            <tr>
                <th>NIS</th>
                <th>N° Doc</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Correo Institucional</th>
                <th>Correo Personal</th>
                <th>Teléfono</th>
                <th>Sexo</th>
                <th>Fecha Nac</th>
                <th>EPS</th>
                <th>Tipo Doc</th>
                <th>Ficha</th>
                <th>PDF</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            @forelse($aprendices as $a)
                <tr>
                    <td>{{ $a->NIS }}</td>
                    <td>{{ $a->Numdoc }}</td>
                    <td>{{ $a->Nombres }}</td>
                    <td>{{ $a->Apellidos }}</td>
                    <td>{{ $a->Direccion }}</td>
                    <td>{{ $a->CorreoInstitucional }}</td>
                    <td>{{ $a->CorreoPersonal }}</td>
                    <td>{{ $a->Telefono ?? '-' }}</td>
                    <td>
                        @if($a->Sexo == 1)
                            <span class="badge bg-primary">Masculino</span>
                        @elseif($a->Sexo == 2)
                            <span class="badge bg-danger">Femenino</span>
                        @else
                            <span class="badge bg-secondary">Otro</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($a->FechaNac)->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge bg-success">
                            {{ $a->eps?->Denominacion ?? '-' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-primary">
                            {{ $a->tiposdocumentos?->Denominacion ?? '-' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-warning text-dark">
                            {{ $a->fichadecaracterizacion?->Denominacion ?? '-' }}
                        </span>
                    </td>
                    <td>
                        @if($a->doc_anexo)
                            <a href="{{ asset($a->doc_anexo) }}"
                               target="_blank"
                               class="btn btn-success btn-sm"
                               title="Ver PDF">
                                <i class="fa-solid fa-file-pdf"></i>
                            </a>
                        @else
                            <span class="badge bg-secondary">Sin PDF</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('aprendices.show', $a->NIS) }}"
                               class="btn btn-info btn-sm" title="Ver">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="{{ route('aprendices.edit', $a->NIS) }}"
                               class="btn btn-warning btn-sm" title="Editar">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('aprendices.destroy', $a->NIS) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Seguro que desea eliminar este aprendiz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        title="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="15" class="text-center py-4">
                        <i class="fa-solid fa-users-slash fa-2x mb-2 text-muted"></i>
                        <p class="mb-0">No hay aprendices registrados.</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
