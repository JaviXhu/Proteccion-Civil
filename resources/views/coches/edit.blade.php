@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Coche</h1>
        <form action="{{ route('coches.update', $coche->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" class="form-control" value="{{ $coche->marca }}">
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" class="form-control" value="{{ $coche->modelo }}">
            </div>

            <div class="form-group">
                <label for="fecha_gasolina">Fecha de Gasolina:</label>
                <input type="date" id="fecha_gasolina" name="fecha_gasolina" class="form-control" value="{{ $coche->fecha_gasolina}}">
            </div>

            <div class="form-group">
                <label for="fecha_itv">Fecha de ITV:</label>
                <input type="date" id="fecha_itv" name="fecha_itv" class="form-control" value="{{ $coche->fecha_itv }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('coches.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
