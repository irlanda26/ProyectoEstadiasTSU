<?php
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/actualizarc.css?v=<?php echo time(); ?>">
    <title>Actualizar</title>
</head>
<body>
    <div id="contenedor-p">
        <header>
            <nav>
              <a href="home.php">Inicio</a>
              <a href="citas.php">Citas</a>
              <a href="expedientes.php">expedientes</a>
              <a href="inicio.php">Cerrar sesión</a>
              <a href="usuarios.php">Usuarios</a>
            </nav>
        </header>
    </div>
    <div id="cuerpo">
        <form action="../php/aec.php" method="post">
            <table class="tablota" border="1">
                <thead >
                    <th colspan="2" class="titulo">Datos de la cita</th>
                </thead>
                <?php
                $cita = $_GET['cita'];
                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM citas WHERE ID_cita=:vcita");
                $pdo -> bindParam(":vcita", $cita, PDO::PARAM_STR);
                $pdo -> execute();
                $resultado = $pdo -> fetchAll();
                foreach($resultado as $key => $value) {
                    echo '
                <tr>
                    <th>Paciente:</th>
                    <td>
                        <input type="text" value="'.$value['paciente'].'" name="paciente">
                        <input type="hidden" value="'.$value['ID_cita'].'" name="idc">
                    </td>
                </tr>
                <tr>
                    <th>Tutor:</th>
                    <td><input type="text" value="'.$value['tutor'].'" name="tutor"></td>
                </tr>
                <tr>
                    <th>No. Teléfono</th>
                    <td><input type="text" value="'.$value['telefono'].'" name="tel"></td>
                </tr>
                <tr>
                    <th>Fecha:</th>
                    <td><input type="date" value="'.$value['fecha'].'" name="fecha"></td>
                </tr>
                <tr>
                    <th>Hora:</th>
                    <td><input type="time" value="'.$value['hora'].'" name="hora"></td>
                </tr>
                <tr>
                    <th>Motivo:</th>
                    <td><input type="text" value="'.$value['descrip'].'" name="motivo"></td>
                </tr>';
                }?>
            </table>
        <button>
            Actualizar
        </button>
        </form>
    </div>
</body>
</html>