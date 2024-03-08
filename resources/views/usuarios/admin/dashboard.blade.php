<!-- resources/views/usuario/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido al Panel de Administración</h1>

    <div>
        <h2>Acciones disponibles:</h2>
        <ul>
            <li><a href="{{ route('coches.index') }}">Gestionar Coches</a></li>
            <li><a href="{{ route('personal.index') }}">Gestionar Personal</a></li>
            <li><a href="{{ route('objetos.index') }}">Gestionar Objetos</a></li>
            <li><a href="{{ route('actividades.index') }}">Gestionar Actividades</a></li>
        </ul>
    </div>
     <!-- Botón para desloguear -->
     <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Desloguear</button>
    </form>
</body>
</html>
