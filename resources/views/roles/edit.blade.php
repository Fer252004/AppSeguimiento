@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Rol Administrativo</div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $rol->NIS) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="Descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control @error('Descripcion') is-invalid @enderror"
                                   id="Descripcion" name="Descripcion" value="{{ old('Descripcion', $rol->Descripcion) }}" required>
                            @error('Descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
