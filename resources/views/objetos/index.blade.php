@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Objetos</h1>

        <a href="{{ route('objetos.create') }}" class="btn btn-primary">Agregar Objeto</a>
        <a href="{{ route('usuarios.admin.dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Usuario ID</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($objetos as $objeto)
                    <tr>
                        <td>{{ $objeto->id }}</td>
                        <td>{{ $objeto->nombre }}</td>
                        <td>{{ $objeto->tipo }}</td>
                        <td>{{ $objeto->cantidad }}</td>
                        <td>{{ $objeto->usuario_id }}</td>
                        <td>
                            <a href="{{ route('objetos.show', $objeto->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('objetos.edit', $objeto->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('objetos.destroy', $objeto->id) }}" method="POST" style="display: inline-block;">
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
