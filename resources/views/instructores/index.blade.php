@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Instructores</h1>
        <a href="{{ route('instructores.create') }}" class="btn btn-primary">Nuevo Instructor</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo Institucional</th>
            <th>EPS</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($instructores as $instructor)
            <tr>
                <td>{{ $instructor->Numdoc }}</td>
                <td>{{ $instructor->Nombres }}</td>
                <td>{{ $instructor->Apellidos }}</td>
                <td>{{ $instructor->CorreoInstitucional }}</td>
                <td>{{ $instructor->eps->Denominacion ?? 'N/A' }}</td>
                <td>{{ $instructor->rolesadministrativos->Descripcion ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('instructores.show', $instructor->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('instructores.edit', $instructor->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('instructores.destroy', $instructor->NIS) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
