<?php
    require 'conexion.php';
    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['pass'])) {
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $pass=password_hash($_POST['pass'], PASSWORD_BCRYPT);

    $pdo = ConexionBD::cBD()->prepare("INSERT INTO usuarios (nombre, apellido, pass) VALUES (:vnombre, :vapellido, :vpass)");
    $pdo -> bindParam(":vnombre", $nombre, PDO::PARAM_STR);
    $pdo -> bindParam(":vapellido", $apellido, PDO::PARAM_STR);
    $pdo -> bindParam(":vpass", $pass, PDO::PARAM_STR);

    if($pdo -> execute()) {
        echo "<script>
                alert('si')
                window.location.href= '../html/usuarios.php';
            </script>";
    }else{
        echo 'error al agregar registro';
    }    
    }
    
?>