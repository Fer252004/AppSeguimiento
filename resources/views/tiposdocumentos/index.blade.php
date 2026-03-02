@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Tipos de Documentos</h1>
        <a href="{{ route('tiposdocumentos.create') }}" class="btn btn-primary">Nuevo Tipo</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tipos as $tipo)
            <tr>
                <td>{{ $tipo->Denominacion }}</td>
                <td>{{ $tipo->Observaciones ?? 'Sin observaciones' }}</td>
                <td>
                    <a href="{{ route('tiposdocumentos.show', $tipo->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('tiposdocumentos.edit', $tipo->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('tiposdocumentos.destroy', $tipo->NIS) }}" method="POST" style="display: inline;">
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
