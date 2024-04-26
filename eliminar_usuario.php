<?php
require_once "conexion.php";

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $id = trim($_GET["id"]);

    $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            header("location: index.php");
            exit();
        } else{
            echo "Intentar de nuevo";
        }
    }
    $stmt->close();
}
$conn->close();
?>
