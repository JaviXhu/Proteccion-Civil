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

        <h1>Editar Objeto</h1>
        <form action="{{ route('objetos.update', $objeto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $objeto->nombre }}">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" class="form-control" value="{{ $objeto->tipo }}">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ $objeto->cantidad }}">
            </div>
            <div class="form-group">
                <label for="usuario_id">ID de Usuario:</label>
                <input type="number" id="usuario_id" name="usuario_id" class="form-control" value="{{ $objeto->usuario_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('objetos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
