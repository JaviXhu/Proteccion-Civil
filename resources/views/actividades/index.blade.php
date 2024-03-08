@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Actividades</h1>

        <a href="{{ route('actividades.create') }}" class="btn btn-primary">Agregar Actividad</a>
        <a href="{{ route('usuarios.admin.dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Municipio</th>
                    <th>Calle</th>
                    <th>Tipo</th>
                    <th>Horas</th>
                    <th>Fecha</th>
                    <th>Usuario ID</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->id }}</td>
                        <td>{{ $actividad->nombre }}</td>
                        <td>{{ $actividad->municipio }}</td>
                        <td>{{ $actividad->calle }}</td>
                        <td>{{ $actividad->tipo }}</td>
                        <td>{{ $actividad->horas }}</td>
                        <td>{{ $actividad->fecha }}</td>
                        <td>{{ $actividad->usuario_id }}</td>
                        <td>
                            <a href="{{ route('actividades.show', $actividad->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('actividades.edit', $actividad->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
