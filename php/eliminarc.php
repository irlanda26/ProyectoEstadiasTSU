<?php
    require 'conexion.php';
 
    $cid=$_POST['cid'];

    $pdo = conexionBD::cBD()->prepare("DELETE FROM citas WHERE ID_cita=:id");
    $pdo -> bindParam(":id", $cid, PDO::PARAM_INT);
     
    if($pdo -> execute()) {
        echo "<script>
        alert('Cita eliminada')
            window.location.href= '../html/citas.php';
            </script>";
        }else{
        echo 'error al agregar registro';
        }
?> 