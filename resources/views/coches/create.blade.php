@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Nuevo Coche</h1>
        <form action="{{ route('coches.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" class="form-control">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha_gasolina">Fecha de Gasolina:</label>
                <input type="date" id="fecha_gasolina" name="fecha_gasolina" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha_itv">Fecha de ITV:</label>
                <input type="date" id="fecha_itv" name="fecha_itv" class="form-control">
            </div>

            <!-- Campo oculto para enviar el usuario_id -->
            <input type="hidden" id="usuario_id" name="usuario_id" value="{{ Auth::id() }}">

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('coches.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
