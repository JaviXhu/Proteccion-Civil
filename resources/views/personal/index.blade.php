@extends('layouts.app')
@section('content')
    <div class="container">


        <h1>Personal</h1>

        <a href="{{ route('personal.create') }}" class="btn btn-primary">Agregar Personal</a>
        <a href="{{ route('usuarios.admin.dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a> <!-- Agregar este botón -->

        <table class="table mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Permiso de conducir</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($personales as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->carne == 1 ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('personal.show', $empleado->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('personal.edit', $empleado->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('personal.destroy', $empleado->id) }}" method="POST"
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
