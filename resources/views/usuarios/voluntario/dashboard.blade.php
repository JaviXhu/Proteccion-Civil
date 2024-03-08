@extends('layouts.app')

@section('content')
    <h1>Dashboard del Voluntario</h1>
    <h2>Actividades</h2>
    <ul>
        @foreach($actividades as $actividad)
            <li>{{ $actividad->nombre }}</li>
        @endforeach
    </ul>
    
    <!-- Botón para desloguear -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Desloguear</button>
    </form>
@endsection
