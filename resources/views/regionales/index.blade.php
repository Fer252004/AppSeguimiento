<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Regionales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fa-solid fa-map-location-dot"></i> Regionales</h2>
        <a href="{{ route('regionales.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Nueva Regional
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg-white shadow-sm text-center align-middle">
            <thead class="table-dark">
            <tr>
                <th>NIS</th>
                <th>Código</th>
                <th>Denominación</th>
                <th>Observaciones</th>
                <th>Centros</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($regionales as $regional)
                <tr>
                    <td>{{ $regional->NIS }}</td>
                    <td>{{ $regional->Codigo }}</td>
                    <td>{{ $regional->Denominacion }}</td>
                    <td>{{ $regional->Observaciones ?? '-' }}</td>
                    <td>
                        <span class="badge bg-info">{{ $regional->centrosFormacion->count() }}</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('regionales.show', $regional->NIS) }}"
                               class="btn btn-info btn-sm" title="Ver">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('regionales.edit', $regional->NIS) }}"
                               class="btn btn-warning btn-sm" title="Editar">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            @if($regional->centrosFormacion->count() == 0)
                                <form action="{{ route('regionales.destroy', $regional->NIS) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Seguro que desea eliminar esta regional?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @else
                                <button type="button" class="btn btn-danger btn-sm" disabled
                                        title="No se puede eliminar porque tiene centros asociados">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <i class="fa-solid fa-map-location-dot fa-2x mb-2 text-muted"></i>
                        <p class="mb-0">No hay regionales registradas.</p>
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
