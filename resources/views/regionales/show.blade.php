<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle Regional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4><i class="fa-solid fa-map-location-dot"></i> Detalles de la Regional</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:200px;">NIS</th>
                            <td>{{ $regional->NIS }}</td>
                        </tr>
                        <tr>
                            <th>Código</th>
                            <td>{{ $regional->Codigo }}</td>
                        </tr>
                        <tr>
                            <th>Denominación</th>
                            <td>{{ $regional->Denominacion }}</td>
                        </tr>
                        <tr>
                            <th>Observaciones</th>
                            <td>{{ $regional->Observaciones ?? 'Sin observaciones' }}</td>
                        </tr>
                    </table>

                    @if($regional->centrosFormacion->count() > 0)
                        <div class="mt-4">
                            <h5>Centros de Formación asociados:</h5>
                            <div class="alert alert-info">
                                <i class="fa-solid fa-info-circle"></i>
                                Esta regional tiene {{ $regional->centrosFormacion->count() }} centro(s) de formación.
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead class="table-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Denominación</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($regional->centrosFormacion as $centro)
                                    <tr>
                                        <td>{{ $centro->Codigo }}</td>
                                        <td>{{ $centro->Denominacion }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Volver
                        </a>
                        <a href="{{ route('regionales.edit', $regional->NIS) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </a>
                        @if($regional->centrosFormacion->count() == 0)
                            <form action="{{ route('regionales.destroy', $regional->NIS) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Seguro que desea eliminar esta regional?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        @else
                            <button type="button" class="btn btn-danger" disabled
                                    title="No se puede eliminar porque tiene centros asociados">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
