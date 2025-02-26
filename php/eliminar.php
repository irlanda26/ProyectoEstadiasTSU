<?php
    require_once "conexion.php";
    $uid=$_POST['uid'];

    $pdo = conexionBD::cBD()->prepare("DELETE FROM usuarios WHERE idusuarios=:id");
    $pdo -> bindParam(":id", $uid, PDO::PARAM_INT);
     
    if($pdo -> execute()) {
        echo "<script>
            alert('Usuario eliminado')
            window.location.href= '../html/usuarios.php';
        </script>";
        }else{
        echo 'error al agregar registro';
        }
?>