<?php
require 'conexion.php';
    $acid=$_POST['idc'];
    $paciente=$_POST['paciente'];
    $tutor=$_POST['tutor'];
    $tel=$_POST['tel'];
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];
    $descrip=$_POST['motivo'];

    $pdo2 = ConexionBD::cBD() -> prepare("UPDATE citas SET paciente = :vpaciente, tutor = :vtutor, telefono = :vtel, fecha = :vfecha, hora = :vhora, descrip = :vdescrip WHERE ID_cita=:cid");
    $pdo2 -> bindParam(":cid", $acid, PDO::PARAM_INT);
    $pdo2 -> bindParam(":vpaciente", $paciente, PDO::PARAM_STR);
    $pdo2 -> bindParam(":vtutor", $tutor, PDO::PARAM_STR);
    $pdo2 -> bindParam(":vtel", $tel, PDO::PARAM_STR);
    $pdo2 -> bindParam(":vfecha", $fecha, PDO::PARAM_STR);
    $pdo2 -> bindParam(":vhora", $hora, PDO::PARAM_STR);
    $pdo2 -> bindParam(":vdescrip", $descrip, PDO::PARAM_STR);

    if($pdo2 -> execute()) {
        echo "<script>
        alert('Datos actualizados')
        window.location.href='../html/citas.php';
        </script>";
    }else{
        echo 'error al actualizar';
    }
?> 