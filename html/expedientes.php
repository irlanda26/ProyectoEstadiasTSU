<?php
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/expedientes.css?v=<?php echo time(); ?>">
    <script src="../js/expedientes.js?v=<?php echo time(); ?>" defer></script>
    <title>Expedientes</title>
</head>
<body>
    <div id="contenedor-p">
        <header>
            <nav>
              <a href="home.php">Inicio</a>
              <a href="citas.php">Citas</a>
              <a href="">Expedientes</a>
              <a href="inicio.php">Cerrar sesión</a>
              <a href="usuarios.php">Usuarios</a>
            </nav>
          </header>
       </div>
       <div id="cuerpo">
            <div id="contenedor-filtros">
                <input type="text" placeholder="Buscar" id="buscador">
            </div>
            <div id="contenedor-principal">
                <?php
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente ORDER BY nombre_paciente ASC");
                    $pdo -> execute();
                    $resultado=$pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo 
                        '<div class="contenedor-expe">
                            <h3 class="nombre">'.$value['nombre_paciente'].'</h3> 
                            <div class="contenedor-btn">
                                <div class="btn-m">
                                    <a class="ver" href="expediente.php?expediente='.$value['ID_expediente'].'">Expediente</a>
                                </div>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
</body>
</html>