<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Regional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4><i class="fa-solid fa-plus"></i> Nueva Regional</h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('regionales.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="Codigo" class="form-label">Código</label>
                            <input type="number"
                                   class="form-control @error('Codigo') is-invalid @enderror"
                                   id="Codigo"
                                   name="Codigo"
                                   value="{{ old('Codigo') }}"
                                   required>
                            @error('Codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Denominacion" class="form-label">Denominación</label>
                            <input type="text"
                                   class="form-control @error('Denominacion') is-invalid @enderror"
                                   id="Denominacion"
                                   name="Denominacion"
                                   value="{{ old('Denominacion') }}"
                                   required>
                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('Observaciones') is-invalid @enderror"
                                      id="Observaciones"
                                      name="Observaciones"
                                      rows="3">{{ old('Observaciones') }}</textarea>
                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Guardar
                            </button>
                            <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
