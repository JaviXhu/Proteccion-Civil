@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Agregar Nuevo Objeto</h1>
        <form action="{{ route('objetos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" class="form-control">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control">
            </div>
            <div class="form-group">
                <label for="usuario_id">ID de Usuario:</label>
                <input type="number" id="usuario_id" name="usuario_id" class="form-control" value="{{ Auth::id() }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('objetos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
