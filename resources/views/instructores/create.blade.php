@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nuevo Instructor</div>
                <div class="card-body">
                    <form action="{{ route('instructores.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tbltiposdocumentos_NIS" class="form-label">Tipo Documento</label>
                                    <select class="form-control @error('tbltiposdocumentos_NIS') is-invalid @enderror"
                                            id="tbltiposdocumentos_NIS" name="tbltiposdocumentos_NIS" required>
                                        <option value="">Seleccione</option>
                                        @foreach($tiposdocumentos as $tipo)
                                            <option value="{{ $tipo->NIS }}" {{ old('tbltiposdocumentos_NIS') == $tipo->NIS ? 'selected' : '' }}>
                                                {{ $tipo->Denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tbltiposdocumentos_NIS')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="Numdoc" class="form-label">Número de Documento</label>
                                    <input type="text" class="form-control @error('Numdoc') is-invalid @enderror"
                                           id="Numdoc" name="Numdoc" value="{{ old('Numdoc') }}" required>
                                    @error('Numdoc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control @error('Nombres') is-invalid @enderror"
                                           id="Nombres" name="Nombres" value="{{ old('Nombres') }}" required>
                                    @error('Nombres')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control @error('Apellidos') is-invalid @enderror"
                                           id="Apellidos" name="Apellidos" value="{{ old('Apellidos') }}" required>
                                    @error('Apellidos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Sexo" class="form-label">Sexo</label>
                                    <select class="form-control @error('Sexo') is-invalid @enderror"
                                            id="Sexo" name="Sexo" required>
                                        <option value="">Seleccione</option>
                                        <option value="1" {{ old('Sexo') == 1 ? 'selected' : '' }}>Masculino</option>
                                        <option value="2" {{ old('Sexo') == 2 ? 'selected' : '' }}>Femenino</option>
                                    </select>
                                    @error('Sexo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="FechaNac" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control @error('FechaNac') is-invalid @enderror"
                                           id="FechaNac" name="FechaNac" value="{{ old('FechaNac') }}" required>
                                    @error('FechaNac')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                                    <label for="CorreoPersonal" class="form-label">Correo Personal</label>
                                    <input type="email" class="form-control @error('CorreoPersonal') is-invalid @enderror"
                                           id="CorreoPersonal" name="CorreoPersonal" value="{{ old('CorreoPersonal') }}">
                                    @error('CorreoPersonal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="CorreoInstitucional" class="form-label">Correo Institucional</label>
                            <input type="email" class="form-control @error('CorreoInstitucional') is-invalid @enderror"
                                   id="CorreoInstitucional" name="CorreoInstitucional" value="{{ old('CorreoInstitucional') }}" required>
                            @error('CorreoInstitucional')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tbleps_NIS" class="form-label">EPS</label>
                                    <select class="form-control @error('tbleps_NIS') is-invalid @enderror"
                                            id="tbleps_NIS" name="tbleps_NIS" required>
                                        <option value="">Seleccione EPS</option>
                                        @foreach($eps as $epsItem)
                                            <option value="{{ $epsItem->NIS }}" {{ old('tbleps_NIS') == $epsItem->NIS ? 'selected' : '' }}>
                                                {{ $epsItem->Denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tbleps_NIS')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tblrolesadministrativos_NIS" class="form-label">Rol Administrativo</label>
                                    <select class="form-control @error('tblrolesadministrativos_NIS') is-invalid @enderror"
                                            id="tblrolesadministrativos_NIS" name="tblrolesadministrativos_NIS" required>
                                        <option value="">Seleccione Rol</option>
                                        @foreach($roles as $rol)
                                            <option value="{{ $rol->NIS }}" {{ old('tblrolesadministrativos_NIS') == $rol->NIS ? 'selected' : '' }}>
                                                {{ $rol->Descripcion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tblrolesadministrativos_NIS')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('instructores.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
