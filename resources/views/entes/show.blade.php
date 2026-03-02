@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Ente Coformador</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Tipo Documento:</th>
                            <td>{{ $ente->Tdoc }}</td>
                        </tr>
                        <tr>
                            <th>Número Documento:</th>
                            <td>{{ $ente->Numdoc }}</td>
                        </tr>
                        <tr>
                            <th>Razón Social:</th>
                            <td>{{ $ente->RazonSocial }}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $ente->Direccion ?? 'No registrada' }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $ente->Telefono ?? 'No registrado' }}</td>
                        </tr>
                        <tr>
                            <th>Correo Institucional:</th>
                            <td>{{ $ente->CorreoInstitucional }}</td>
                        </tr>
                    </table>

                    @if($ente->aprendices->count() > 0)
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
                            @foreach($ente->aprendices as $aprendiz)
                                <tr>
                                    <td>{{ $aprendiz->NumeroDocumento }}</td>
                                    <td>{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</td>
                                    <td>{{ $aprendiz->CorreoInstitucional }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('entes.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('entes.edit', $ente->NIS) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
