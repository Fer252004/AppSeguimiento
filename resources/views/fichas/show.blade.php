@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles de la Ficha de Caracterización</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Código:</th>
                            <td>{{ $ficha->Codigo }}</td>
                        </tr>
                        <tr>
                            <th>Denominación:</th>
                            <td>{{ $ficha->Denominacion }}</td>
                        </tr>
                        <tr>
                            <th>Programa de Formación:</th>
                            <td>{{ $ficha->programasdeformacion->Denominacion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Centro de Formación:</th>
                            <td>{{ $ficha->centrodeformacion->Denominacion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Cupo:</th>
                            <td>{{ $ficha->Cupo }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Inicio:</th>
                            <td>{{ $ficha->FechaInicio }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Fin:</th>
                            <td>{{ $ficha->FechaFin }}</td>
                        </tr>
                        <tr>
                            <th>Observaciones:</th>
                            <td>{{ $ficha->Observaciones ?? 'Sin observaciones' }}</td>
                        </tr>
                    </table>

                    @if($ficha->aprendices->count() > 0)
                        <h5 class="mt-4">Aprendices asociados</h5>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ficha->aprendices as $aprendiz)
                                <tr>
                                    <td>{{ $aprendiz->NumeroDocumento }}</td>
                                    <td>{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</td>
                                    <td>{{ $aprendiz->CorreoInstitucional }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('fichas.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('fichas.edit', $ficha->NIS) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
