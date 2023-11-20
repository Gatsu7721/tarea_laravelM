@extends('app')

@section('title', 'Inicio')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="jumbotron text-center">
    <h1>Bienvenido a City Tours</h1>
    <p>Tu mejor opción para explorar la ciudad.</p>
    <a href="/tours" class="btn btn-primary btn-lg">Ver Tours</a>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-lg">Ver Clientes</a>
</div>

<div class="container mt-5">
    <h2>Agregar Nuevo Cliente</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico') }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
        </div>

        <button type="submit" class="btn btn-primary">Agregar Cliente</button>
    </form>
</div>

@endsection
