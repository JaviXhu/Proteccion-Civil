@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Personal</h1>
        <form action="{{ route('personal.update', $personal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $personal->nombre }}">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ $personal->apellidos }}">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" class="form-control" value="{{ $personal->email }}">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $personal->telefono }}">
            </div>
            <div class="form-group">
                <label for="carne">Permiso de Conducir:</label>
                <select id="carne" name="carne" class="form-control">
                    <option value="1" {{ $personal->carne ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$personal->carne ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('personal.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
