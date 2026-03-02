@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Programa de Formación</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Código:</th>
                            <td>{{ $programa->Codigo }}</td>
                        </tr>
                        <tr>
                            <th>Denominación:</th>
                            <td>{{ $programa->Denominacion }}</td>
                        </tr>
                        <tr>
                            <th>Observaciones:</th>
                            <td>{{ $programa->Observaciones ?? 'Sin observaciones' }}</td>
                        </tr>
                    </table>

                    @if($programa->fichasCaracterizacion->count() > 0)
                        <h5 class="mt-4">Fichas de Caracterización asociadas</h5>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Denominación</th>
                                <th>Centro</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($programa->fichasCaracterizacion as $ficha)
                                <tr>
                                    <td>{{ $ficha->Codigo }}</td>
                                    <td>{{ $ficha->Denominacion }}</td>
                                    <td>{{ $ficha->centrodeformacion->Denominacion ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('programas.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('programas.edit', $programa->NIS) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
