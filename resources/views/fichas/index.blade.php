@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Fichas de Caracterización</h1>
        <a href="{{ route('fichas.create') }}" class="btn btn-primary">Nueva Ficha</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Código</th>
            <th>Denominación</th>
            <th>Programa</th>
            <th>Centro</th>
            <th>Cupo</th>
            <th>Fechas</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fichas as $ficha)
            <tr>
                <td>{{ $ficha->Codigo }}</td>
                <td>{{ $ficha->Denominacion }}</td>
                <td>{{ $ficha->programasdeformacion->Denominacion ?? 'N/A' }}</td>
                <td>{{ $ficha->centrodeformacion->Denominacion ?? 'N/A' }}</td>
                <td>{{ $ficha->Cupo }}</td>
                <td>{{ $ficha->FechaInicio }} al {{ $ficha->FechaFin }}</td>
                <td>
                    <a href="{{ route('fichas.show', $ficha->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('fichas.edit', $ficha->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('fichas.destroy', $ficha->NIS) }}" method="POST" style="display: inline;">
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
