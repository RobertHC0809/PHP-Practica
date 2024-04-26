<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <?php
    require_once "conexion.php";

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id = trim($_GET["id"]);

        $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $nombre = $row["nombre"];
                    $correo = $row["correo"];
                } else{
                    echo "No se encontro el usuario.";
                    exit();
                }
            }
            $stmt->close();
        }

    } else{
        echo "URL inválida.";
        exit();
    }
    ?>
    <form action="procesar_usuario.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
        Correo: <input type="email" name="correo" value="<?php echo $correo; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
