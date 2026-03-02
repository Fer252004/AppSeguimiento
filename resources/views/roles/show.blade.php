@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Rol Administrativo</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $rol->Descripcion }}</td>
                        </tr>
                    </table>

                    @if($rol->instructores->count() > 0)
                        <h5 class="mt-4">Instructores con este rol</h5>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rol->instructores as $instructor)
                                <tr>
                                    <td>{{ $instructor->Numdoc }}</td>
                                    <td>{{ $instructor->Nombres }} {{ $instructor->Apellidos }}</td>
                                    <td>{{ $instructor->CorreoInstitucional }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">No hay instructores con este rol.</p>
                    @endif

                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
                    <a href="{{ route('roles.edit', $rol->NIS) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
