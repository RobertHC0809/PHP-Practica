<?php
require_once "conexion.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];

        $sql = "UPDATE usuarios SET nombre=?, correo=? WHERE id_usuario=?";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ssi", $nombre, $correo, $id);
            if($stmt->execute()){
                header("location: index.php");
                exit();
            } else{
                echo "Intentar mas tarde";
            }
            $stmt->close();
        }
    } else{
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];

        $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("sss", $nombre, $correo, $contrasena);
            if($stmt->execute()){
                header("location: index.php");
                exit();
            } else{
                echo "Intentar de nuevo";
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
