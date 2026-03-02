@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Instructor</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Tipo Documento:</th>
                            <td>{{ $instructor->tiposdocumentos->Denominacion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Número Documento:</th>
                            <td>{{ $instructor->Numdoc }}</td>
                        </tr>
                        <tr>
                            <th>Nombres:</th>
                            <td>{{ $instructor->Nombres }}</td>
                        </tr>
                        <tr>
                            <th>Apellidos:</th>
                            <td>{{ $instructor->Apellidos }}</td>
                        </tr>
                        <tr>
                            <th>Sexo:</th>
                            <td>
                                @if($instructor->Sexo == 'M') Masculino
                                @elseif($instructor->Sexo == 'F') Femenino
                                @else Otro
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha Nacimiento:</th>
                            <td>{{ $instructor->FechaNac }}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $instructor->Direccion ?? 'No registrada' }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $instructor->Telefono ?? 'No registrado' }}</td>
                        </tr>
                        <tr>
                            <th>Correo Personal:</th>
                            <td>{{ $instructor->CorreoPersonal ?? 'No registrado' }}</td>
                        </tr>
                        <tr>
                            <th>Correo Institucional:</th>
                            <td>{{ $instructor->CorreoInstitucional }}</td>
                        </tr>
                        <tr>
                            <th>EPS:</th>
                            <td>{{ $instructor->eps->Denominacion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Rol Administrativo:</th>
                            <td>{{ $instructor->rolesadministrativos->Descripcion ?? 'N/A' }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('instructores.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('instructores.edit', $instructor->NIS) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
