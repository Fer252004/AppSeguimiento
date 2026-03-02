@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nueva Ficha de Caracterización</div>
                <div class="card-body">
                    <form action="{{ route('fichas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="Codigo" class="form-label">Código</label>
                            <input type="text" class="form-control @error('Codigo') is-invalid @enderror"
                                   id="Codigo" name="Codigo" value="{{ old('Codigo') }}" required>
                            @error('Codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Denominacion" class="form-label">Denominación</label>
                            <input type="text" class="form-control @error('Denominacion') is-invalid @enderror"
                                   id="Denominacion" name="Denominacion" value="{{ old('Denominacion') }}" required>
                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tblprogramasdeformacion_NIS" class="form-label">Programa de Formación</label>
                                    <select class="form-control @error('tblprogramasdeformacion_NIS') is-invalid @enderror"
                                            id="tblprogramasdeformacion_NIS" name="tblprogramasdeformacion_NIS" required>
                                        <option value="">Seleccione un programa</option>
                                        @foreach($programas as $programa)
                                            <option value="{{ $programa->NIS }}" {{ old('tblprogramasdeformacion_NIS') == $programa->NIS ? 'selected' : '' }}>
                                                {{ $programa->Denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tblprogramasdeformacion_NIS')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tblcentrodeformacion_NIS" class="form-label">Centro de Formación</label>
                                    <select class="form-control @error('tblcentrodeformacion_NIS') is-invalid @enderror"
                                            id="tblcentrodeformacion_NIS" name="tblcentrodeformacion_NIS" required>
                                        <option value="">Seleccione un centro</option>
                                        @foreach($centros as $centro)
                                            <option value="{{ $centro->NIS }}" {{ old('tblcentrodeformacion_NIS') == $centro->NIS ? 'selected' : '' }}>
                                                {{ $centro->Denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tblcentrodeformacion_NIS')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="Cupo" class="form-label">Cupo</label>
                                    <input type="number" class="form-control @error('Cupo') is-invalid @enderror"
                                           id="Cupo" name="Cupo" value="{{ old('Cupo') }}" required>
                                    @error('Cupo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="FechaInicio" class="form-label">Fecha de Inicio</label>
                                    <input type="date" class="form-control @error('FechaInicio') is-invalid @enderror"
                                           id="FechaInicio" name="FechaInicio" value="{{ old('FechaInicio') }}" required>
                                    @error('FechaInicio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="FechaFin" class="form-label">Fecha de Fin</label>
                                    <input type="date" class="form-control @error('FechaFin') is-invalid @enderror"
                                           id="FechaFin" name="FechaFin" value="{{ old('FechaFin') }}" required>
                                    @error('FechaFin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="Observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('Observaciones') is-invalid @enderror"
                                      id="Observaciones" name="Observaciones" rows="3">{{ old('Observaciones') }}</textarea>
                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('fichas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
