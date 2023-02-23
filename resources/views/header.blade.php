<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>EventosTec</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

  </head>
<body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="/"><i class="bi bi-gem text-info"></i> EventosTec</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mx-5" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="/packs" id="nav-packs">Paquetes</a>
          </li>
          @can('viewAny', App\Models\Event::class)
          <li class="nav-item">
            <a class="nav-link" href="/events" id="nav-events">Eventos</a>
          </li>
          @endcan
          @can('viewAny', App\Models\User::class)
          <li class="nav-item">
            <a class="nav-link" href="/users" id="nav-users">Usuarios</a>
          </li>
          @endcan
          @can('viewAny', App\Models\Payment::class)
          <li class="nav-item">
            <a class="nav-link" href="/payments" id="nav-payments">Abonos</a>
          </li>
          @endcan
        </ul>
            
        @if(Auth::check())
          <a href="{{route('login.logout')}}" class="btn btn-outline-primary"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
        @else
          <a href="{{route('login.login')}}" class="btn btn-outline-primary"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</a>
        @endif
        
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">