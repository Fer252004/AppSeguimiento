@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Centros de Formación</h1>
        <a href="{{ route('centros.create') }}" class="btn btn-primary">Nuevo Centro</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Código</th>
            <th>Denominación</th>
            <th>Regional</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($centros as $centro)
            <tr>
                <td>{{ $centro->Codigo }}</td>
                <td>{{ $centro->Denominacion }}</td>
                <td>{{ $centro->regionales->Denominacion ?? 'N/A' }}</td>
                <td>{{ $centro->Observaciones ?? 'Sin observaciones' }}</td>
                <td>
                    <a href="{{ route('centros.show', $centro->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('centros.edit', $centro->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('centros.destroy', $centro->NIS) }}" method="POST" style="display: inline;">
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
