<h2>Registro de Nuevo Usuario</h2>

<form action="index.php?action=registrar" method="POST">
    <label for="cedula">Cédula:</label><br>
    <input type="text" name="cedula" id="cedula" required><br><br>

    <label for="nombre">Nombre Completo:</label><br>
    <input type="text" name="nombre" id="nombre" required><br><br>

    <label for="nombreusuario">Nombre de Usuario (sin espacios):</label><br>
    <input type="text" name="nombreusuario" id="nombreusuario" required><br><br>

    <label for="clave">Contraseña (sin espacios):</label><br>
    <input type="password" name="clave" id="clave" required><br><br>

    <button type="submit">Registrar Usuario</button>
</form>

<hr>
<p>¿Ya tienes una cuenta? <a href="index.php?action=login_form">Inicia sesión aquí</a></p>
