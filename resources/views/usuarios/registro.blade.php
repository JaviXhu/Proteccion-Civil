<!-- resources/views/usuarios/registro.blade.php -->
<form method="POST" action="{{ route('usuario.store') }}">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
    </div>
    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">
    </div>
    <!-- Agrega más campos según tus necesidades (rol, etc.) -->
    <div>
        <button type="submit">Registrar</button>
    </div>
</form>

