@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Programas de Formación</h1>
        <a href="{{ route('programas.create') }}" class="btn btn-primary">Nuevo Programa</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Código</th>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($programas as $programa)
            <tr>
                <td>{{ $programa->Codigo }}</td>
                <td>{{ $programa->Denominacion }}</td>
                <td>{{ $programa->Observaciones ?? 'Sin observaciones' }}</td>
                <td>
                    <a href="{{ route('programas.show', $programa->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('programas.edit', $programa->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('programas.destroy', $programa->NIS) }}" method="POST" style="display: inline;">
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
