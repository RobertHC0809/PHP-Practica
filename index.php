<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .button-edit {
            background-color: #008CBA;
        }

        .button-delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h2>CRUD de Usuarios</h2>
    <a href="crear_usuario.php" class="button">Crear Nuevo Usuario</a>
    <br><br>

    <?php
    require_once "conexion.php";

    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Acciones</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_usuario"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["correo"] . "</td>";
            echo "<td>";
            echo "<a href='editar_usuario.php?id=" . $row["id_usuario"] . "' class='button button-edit'>Editar</a>";
            echo "<a href='eliminar_usuario.php?id=" . $row["id_usuario"] . "' class='button button-delete'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron usuarios.";
    }

    $conn->close();
    ?>
</body>
</html>
