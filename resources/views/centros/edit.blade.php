@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Centro de Formación</div>
                <div class="card-body">
                    <form action="{{ route('centros.update', $centro->NIS) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="Codigo" class="form-label">Código</label>
                            <input type="text" class="form-control @error('Codigo') is-invalid @enderror"
                                   id="Codigo" name="Codigo" value="{{ old('Codigo', $centro->Codigo) }}" required>
                            @error('Codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Denominacion" class="form-label">Denominación</label>
                            <input type="text" class="form-control @error('Denominacion') is-invalid @enderror"
                                   id="Denominacion" name="Denominacion" value="{{ old('Denominacion', $centro->Denominacion) }}" required>
                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tblregionales_NIS" class="form-label">Regional</label>
                            <select class="form-control @error('tblregionales_NIS') is-invalid @enderror"
                                    id="tblregionales_NIS" name="tblregionales_NIS" required>
                                <option value="">Seleccione una regional</option>
                                @foreach($regionales as $regional)
                                    <option value="{{ $regional->NIS }}" {{ old('tblregionales_NIS', $centro->tblregionales_NIS) == $regional->NIS ? 'selected' : '' }}>
                                        {{ $regional->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tblregionales_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('Observaciones') is-invalid @enderror"
                                      id="Observaciones" name="Observaciones" rows="3">{{ old('Observaciones', $centro->Observaciones) }}</textarea>
                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('centros.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
