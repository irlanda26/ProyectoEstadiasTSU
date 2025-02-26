<?php
    require_once "conexion.php";
    $Auid=$_POST['E'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    
    $pdo = ConexionBD::cBD() -> prepare("UPDATE usuarios SET nombre = :vnombre, apellido = :vapellido WHERE idusuarios=:id");
    $pdo -> bindParam(":id", $Auid, PDO::PARAM_INT);
    $pdo -> bindParam(":vnombre", $nombre, PDO::PARAM_STR);
    $pdo -> bindParam(":vapellido", $apellido, PDO::PARAM_STR);

   if($pdo -> execute()) {
    echo "<script>
        alert('Usuario actualizado')
        window.location.href= '../html/usuarios.php';
    </script>";
    }else{
    echo 'error al actualizar';
    }
    ?>