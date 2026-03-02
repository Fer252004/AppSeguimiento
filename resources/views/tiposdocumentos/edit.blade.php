@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Tipo de Documento</div>
                <div class="card-body">
                    <form action="{{ route('tiposdocumentos.update', $tipo->NIS) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="Denominacion" class="form-label">Denominación</label>
                            <input type="text" class="form-control @error('Denominacion') is-invalid @enderror"
                                   id="Denominacion" name="Denominacion" value="{{ old('Denominacion', $tipo->Denominacion) }}" required>
                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('Observaciones') is-invalid @enderror"
                                      id="Observaciones" name="Observaciones" rows="3">{{ old('Observaciones', $tipo->Observaciones) }}</textarea>
                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
