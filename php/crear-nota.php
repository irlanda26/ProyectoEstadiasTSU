<?php
    require 'conexion.php';
    $id=$_POST['idn'];
    $nota=$_POST['nota'];
    $fecha=$_POST['fecha'];

    $pdo = ConexionBD::cBD()->prepare("INSERT INTO notas (fecha, notac, ID_expediente) VALUES (:vfecha, :vnotac, :id)");
    $pdo -> bindParam(":vfecha", $fecha, PDO::PARAM_STR);
    $pdo -> bindParam(":vnotac", $nota, PDO::PARAM_STR);
    $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

    if($pdo -> execute()) {
        echo "<script>
                alert('Nota creada')
                window.location.href= '../html/expediente.php?expediente=".$id."';
            </script>";
    }else{
        echo 'error al agregar registro';
    }
?>