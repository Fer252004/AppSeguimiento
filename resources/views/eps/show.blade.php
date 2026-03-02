@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles de EPS</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>NIT:</th>
                            <td>{{ $eps->Numdoc }}</td>
                        </tr>
                        <tr>
                            <th>Denominación:</th>
                            <td>{{ $eps->Denominacion }}</td>
                        </tr>
                        <tr>
                            <th>Observaciones:</th>
                            <td>{{ $eps->Observaciones ?? 'Sin observaciones' }}</td>
                        </tr>
                    </table>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Instructores asociados: {{ $eps->instructores->count() }}</h5>
                            @if($eps->instructores->count() > 0)
                                <ul class="list-group">
                                    @foreach($eps->instructores as $instructor)
                                        <li class="list-group-item">{{ $instructor->Nombres }} {{ $instructor->Apellidos }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>Aprendices asociados: {{ $eps->aprendices->count() }}</h5>
                            @if($eps->aprendices->count() > 0)
                                <ul class="list-group">
                                    @foreach($eps->aprendices as $aprendiz)
                                        <li class="list-group-item">{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('eps.index') }}" class="btn btn-secondary mt-3">Volver</a>
                    <a href="{{ route('eps.edit', $eps->NIS) }}" class="btn btn-warning mt-3">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
