<?php
    require 'conexion.php';
    $exid=$_POST['iddeids'];

    $pdo = conexionBD::cBD()->prepare("DELETE FROM notas WHERE ID_expediente=:idn");
    $pdo -> bindParam(":idn", $exid, PDO::PARAM_INT);
    $pdo -> execute();

    $pdo2 = conexionBD::cBD()->prepare("DELETE FROM exploracion WHERE ID_expediente=:ide");
    $pdo2 -> bindParam(":ide", $exid, PDO::PARAM_INT);
    $pdo2 -> execute();

    $pdo3 = conexionBD::cBD()->prepare("DELETE FROM diagnostico WHERE ID_expediente=:idd");
    $pdo3 -> bindParam(":idd", $exid, PDO::PARAM_INT);
    $pdo3 -> execute();

    $pdo4 = conexionBD::cBD()->prepare("DELETE FROM an_personales_p WHERE ID_expediente=:idp");
    $pdo4 -> bindParam(":idp", $exid, PDO::PARAM_INT);
    $pdo4 -> execute();

    $pdo5 = conexionBD::cBD()->prepare("DELETE FROM antecedentes_heredofa WHERE ID_expediente=:idh");
    $pdo5 -> bindParam(":idh", $exid, PDO::PARAM_INT);
    $pdo5 -> execute();

    $pdo7 = conexionBD::cBD()->prepare("DELETE FROM consentimiento WHERE ID_expediente=:idc");
    $pdo7 -> bindParam(":idc", $exid, PDO::PARAM_INT);
    $pdo7 -> execute();

    $pdo6 = conexionBD::cBD()->prepare("DELETE FROM expediente WHERE ID_expediente=:idex");
    $pdo6 -> bindParam(":idex", $exid, PDO::PARAM_INT);
    
    if($pdo6 -> execute()) {
        echo "<script>
            alert('Expediente eliminado')
            window.location.href= '../html/expedientes.php';
        </script>";
        }else{
        echo 'error al agregar registro';
        }
?>