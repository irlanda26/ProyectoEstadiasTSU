<?php
    require "conexion.php";
    if(isset($_POST['buscar'])) {
        $buscar = $_POST['buscar'];

        $pdo = ConexionBD::cBD()->prepare("SELECT ID_expediente, nombre_paciente, celular FROM expediente WHERE ID_expediente=:buscar");
        $pdo -> bindParam(":buscar", $buscar, PDO::PARAM_STR);
        $pdo -> execute();
        $resultados = $pdo->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultados);
    }
?>