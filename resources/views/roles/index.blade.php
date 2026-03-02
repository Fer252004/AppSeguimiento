@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Roles Administrativos</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo Rol</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $rol)
            <tr>
                <td>{{ $rol->Descripcion }}</td>
                <td>
                    <a href="{{ route('roles.show', $rol->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('roles.edit', $rol->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('roles.destroy', $rol->NIS) }}" method="POST" style="display: inline;">
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
