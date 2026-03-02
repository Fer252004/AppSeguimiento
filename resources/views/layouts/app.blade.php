<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        {{-- CAMBIADO: route('dashboard') por url('/') si no tienes la ruta definida --}}
        <a class="navbar-brand" href="{{ url('/') }}">SENA - Gestión</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                {{-- Regionales --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Regionales
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('regionales.index') }}">Listar Regionales</a></li>
                        <li><a class="dropdown-item" href="{{ route('regionales.create') }}">Crear Regional</a></li>
                    </ul>
                </li>

                {{-- Centros --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Centros
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('centros.index') }}">Listar Centros</a></li>
                        <li><a class="dropdown-item" href="{{ route('centros.create') }}">Crear Centro</a></li>
                    </ul>
                </li>

                {{-- Programas --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Programas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('programas.index') }}">Listar Programas</a></li>
                        <li><a class="dropdown-item" href="{{ route('programas.create') }}">Crear Programa</a></li>
                    </ul>
                </li>

                {{-- Fichas --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Fichas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('fichas.index') }}">Listar Fichas</a></li>
                        <li><a class="dropdown-item" href="{{ route('fichas.create') }}">Crear Ficha</a></li>
                    </ul>
                </li>

                {{-- Instructores --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Instructores
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('instructores.index') }}">Listar Instructores</a></li>
                        <li><a class="dropdown-item" href="{{ route('instructores.create') }}">Crear Instructor</a></li>
                    </ul>
                </li>

                {{-- Entes --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Entes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('entes.index') }}">Listar Entes</a></li>
                        <li><a class="dropdown-item" href="{{ route('entes.create') }}">Crear Ente</a></li>
                    </ul>
                </li>

                {{-- EPS --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        EPS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('eps.index') }}">Listar EPS</a></li>
                        <li><a class="dropdown-item" href="{{ route('eps.create') }}">Crear EPS</a></li>
                    </ul>
                </li>

                {{-- Tipos Documentos --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Tipos Documentos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('tiposdocumentos.index') }}">Listar Tipos</a></li>
                        <li><a class="dropdown-item" href="{{ route('tiposdocumentos.create') }}">Crear Tipo</a></li>
                    </ul>
                </li>

                {{-- Roles --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Roles
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('roles.index') }}">Listar Roles</a></li>
                        <li><a class="dropdown-item" href="{{ route('roles.create') }}">Crear Rol</a></li>
                    </ul>
                </li>

                {{-- APRENDICES - CORREGIDO: Ahora está fuera del dropdown de Roles --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Aprendices
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('aprendices.index') }}">Listar Aprendices</a></li>
                        <li><a class="dropdown-item" href="{{ route('aprendices.create') }}">Crear Aprendiz</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
