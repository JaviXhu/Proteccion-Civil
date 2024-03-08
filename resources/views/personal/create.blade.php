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
        <h1>Agregar Nuevo Personal</h1>
        <form action="{{ route('personal.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="email" name="correo" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control">
            </div>
            <div class="form-group">
                <label for="carne">Permiso de Conducir:</label>
                <select id="carne" name="carne" class="form-control">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <input type="hidden" id="usuario_id" name="usuario_id" value="{{ Auth::id() }}">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('personal.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
