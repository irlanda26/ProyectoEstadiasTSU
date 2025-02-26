<?php
    require 'conexion.php';

    $paciente = $_POST['paciente'];
    $tutor = $_POST['tutor'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tel = $_POST['tel'];
    $desc = $_POST['desc'];
    $id = $_POST['id_p'];

    try {
        $pdo = ConexionBD::cBD()->prepare("SELECT COUNT(*) FROM citas WHERE fecha = :vfechap AND hora = :vhorap");
        $pdo->bindParam(":vfechap", $fecha, PDO::PARAM_STR);
        $pdo->bindParam(":vhorap", $hora, PDO::PARAM_STR);
        $pdo->execute();

        $count = $pdo->fetchColumn();

        if ($count > 0) {
            echo "<script>
                        alert('Ya hay una cita agendada en esa fecha y hora');
                        window.location.href= '../html/form-cita.php';
                    </script>";
        } else {
            $pdo2 = ConexionBD::cBD()->prepare("INSERT INTO citas (paciente, tutor, hora, fecha, telefono, ID_expediente, descrip) VALUES (:vpaciente, :vtutor, :vhora, :vfecha, :vtelefono, :vid, :vdesc)");
            $pdo2->bindParam(":vpaciente", $paciente, PDO::PARAM_STR);
            $pdo2->bindParam(":vtutor", $tutor, PDO::PARAM_STR);
            $pdo2->bindParam(":vhora", $hora, PDO::PARAM_STR);
            $pdo2->bindParam(":vfecha", $fecha, PDO::PARAM_STR);
            $pdo2->bindParam(":vtelefono", $tel, PDO::PARAM_STR);
            $pdo2->bindParam(":vid", $id, PDO::PARAM_INT);
            $pdo2->bindParam(":vdesc", $desc, PDO::PARAM_STR);

            if ($pdo2->execute()) {
                echo "<script>
                        alert('Cita agendada exitosamente');
                        window.location.href= '../html/citas.php';
                    </script>";
            } else {
                echo "Error al agregar registro";
            }
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>
