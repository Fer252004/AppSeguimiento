@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Centro de Formación</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Código:</th>
                            <td>{{ $centro->Codigo }}</td>
                        </tr>
                        <tr>
                            <th>Denominación:</th>
                            <td>{{ $centro->Denominacion }}</td>
                        </tr>
                        <tr>
                            <th>Regional:</th>
                            <td>{{ $centro->regionales->Denominacion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Observaciones:</th>
                            <td>{{ $centro->Observaciones ?? 'Sin observaciones' }}</td>
                        </tr>
                    </table>

                    @if($centro->fichasCaracterizacion->count() > 0)
                        <h5 class="mt-4">Fichas de Caracterización asociadas</h5>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Denominación</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($centro->fichasCaracterizacion as $ficha)
                                <tr>
                                    <td>{{ $ficha->Codigo }}</td>
                                    <td>{{ $ficha->Denominacion }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('centros.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('centros.edit', $centro->NIS) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
