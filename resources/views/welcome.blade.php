@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Sistema de Gestión SENA</h1>
            <p class="text-center lead">Bienvenido al sistema de gestión de centros de formación</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Regionales</h5>
                    <p class="card-text display-4">{{ \App\Models\regionales::count() }}</p>
                    <a href="{{ route('regionales.index') }}" class="text-white">Ver detalles <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Centros</h5>
                    <p class="card-text display-4">{{ \App\Models\centrodeformacion::count() }}</p>
                    <a href="{{ route('centros.index') }}" class="text-white">Ver detalles <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Programas</h5>
                    <p class="card-text display-4">{{ \App\Models\programasdeformacion::count() }}</p>
                    <a href="{{ route('programas.index') }}" class="text-white">Ver detalles <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Fichas</h5>
                    <p class="card-text display-4">{{ \App\Models\fichadecaracterizacion::count() }}</p>
                    <a href="{{ route('fichas.index') }}" class="text-white">Ver detalles <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
