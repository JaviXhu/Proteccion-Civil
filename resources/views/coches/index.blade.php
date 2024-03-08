@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Coches</h1>

        <a href="{{ route('coches.create') }}" class="btn btn-primary">Agregar Coche</a>
        <a href="{{ route('usuarios.admin.dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fecha de Gasolina</th>
                    <th>Fecha de ITV</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>ID del Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coches as $coche)
                    <tr>
                        <td>{{ $coche->id }}</td>
                        <td>{{ $coche->marca }}</td>
                        <td>{{ $coche->modelo }}</td>
                        <td>{{ $coche->fecha_gasolina }}</td>
                        <td>{{ $coche->fecha_itv }}</td>
                        <td>{{ $coche->created_at }}</td>
                        <td>{{ $coche->updated_at }}</td>
                        <td>{{ $coche->usuario_id }}</td>
                        <td>
                            <a href="{{ route('coches.show', $coche->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('coches.edit', $coche->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('coches.destroy', $coche->id) }}" method="POST"
                                style="display: inline-block;">
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
