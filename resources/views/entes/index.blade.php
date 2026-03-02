@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Entes Coformadores</h1>
        <a href="{{ route('entes.create') }}" class="btn btn-primary">Nuevo Ente</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Tipo Doc</th>
            <th>Número</th>
            <th>Razón Social</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entes as $ente)
            <tr>
                <td>{{ $ente->Tdoc }}</td>
                <td>{{ $ente->Numdoc }}</td>
                <td>{{ $ente->RazonSocial }}</td>
                <td>{{ $ente->Telefono ?? 'N/A' }}</td>
                <td>{{ $ente->CorreoInstitucional }}</td>
                <td>
                    <a href="{{ route('entes.show', $ente->NIS) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('entes.edit', $ente->NIS) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('entes.destroy', $ente->NIS) }}" method="POST" style="display: inline;">
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
