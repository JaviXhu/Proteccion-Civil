@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Personal</h1>
        <p><strong>Nombre:</strong> {{ $personal->nombre }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $personal->correo }}</p>
        <p><strong>Creado:</strong> {{ $personal->created_at }}</p>
        <p><strong>Actualizado:</strong> {{ $personal->updated_at }}</p>
        <a href="{{ route('personal.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
