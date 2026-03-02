@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>EPS</h1>
        <a href="{{ route('eps.create') }}" class="btn btn-primary">Nueva EPS</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>NIT</th>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($eps as $epsItem)
            <tr>
                <td>{{ $epsItem->Numdoc }}</td>
                <td>{{ $epsItem->Denominacion }}</td>
                <td>{{ $epsItem->Observaciones ?? 'Sin observaciones' }}</td>
                <td>
                    <a href="{{ route('eps.show', $epsItem->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('eps.edit', $epsItem->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('eps.destroy', $epsItem->NIS) }}" method="POST" style="display: inline;">
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
