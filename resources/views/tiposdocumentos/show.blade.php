@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Tipo de Documento</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Denominación:</th>
                            <td>{{ $tipo->Denominacion }}</td>
                        </tr>
                        <tr>
                            <th>Observaciones:</th>
                            <td>{{ $tipo->Observaciones ?? 'Sin observaciones' }}</td>
                        </tr>
                    </table>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Instructores con este tipo: {{ $tipo->instructores->count() }}</h5>
                            @if($tipo->instructores->count() > 0)
                                <ul class="list-group">
                                    @foreach($tipo->instructores as $instructor)
                                        <li class="list-group-item">{{ $instructor->Nombres }} {{ $instructor->Apellidos }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>Aprendices con este tipo: {{ $tipo->aprendices->count() }}</h5>
                            @if($tipo->aprendices->count() > 0)
                                <ul class="list-group">
                                    @foreach($tipo->aprendices as $aprendiz)
                                        <li class="list-group-item">{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary mt-3">Volver</a>
                    <a href="{{ route('tiposdocumentos.edit', $tipo->NIS) }}" class="btn btn-warning mt-3">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
