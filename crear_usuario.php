<!DOCTYPE html>
<html>
<head>
    <title>Crear Nuevo Usuario</title>
</head>
<body>
    <h2>Crear Nuevo Usuario</h2>
    <form action="procesar_usuario.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Correo: <input type="email" name="correo"><br>
        Contraseña: <input type="password" name="contrasena"><br>
        <input type="submit" value="Crear Usuario">
    </form>
</body>
</html>
