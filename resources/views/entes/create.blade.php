@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nuevo Ente Coformador</div>
                <div class="card-body">
                    <form action="{{ route('entes.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="Tdoc" class="form-label">Tipo Documento</label>
                                    <input type="text" class="form-control @error('Tdoc') is-invalid @enderror"
                                           id="Tdoc" name="Tdoc" value="{{ old('Tdoc') }}" required>
                                    @error('Tdoc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="Numdoc" class="form-label">Número Documento</label>
                                    <input type="text" class="form-control @error('Numdoc') is-invalid @enderror"
                                           id="Numdoc" name="Numdoc" value="{{ old('Numdoc') }}" required>
                                    @error('Numdoc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="RazonSocial" class="form-label">Razón Social</label>
                            <input type="text" class="form-control @error('RazonSocial') is-invalid @enderror"
                                   id="RazonSocial" name="RazonSocial" value="{{ old('RazonSocial') }}" required>
                            @error('RazonSocial')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control @error('Direccion') is-invalid @enderror"
                                   id="Direccion" name="Direccion" value="{{ old('Direccion') }}">
                            @error('Direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control @error('Telefono') is-invalid @enderror"
                                           id="Telefono" name="Telefono" value="{{ old('Telefono') }}">
                                    @error('Telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="CorreoInstitucional" class="form-label">Correo Institucional</label>
                                    <input type="email" class="form-control @error('CorreoInstitucional') is-invalid @enderror"
                                           id="CorreoInstitucional" name="CorreoInstitucional" value="{{ old('CorreoInstitucional') }}" required>
                                    @error('CorreoInstitucional')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('entes.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
