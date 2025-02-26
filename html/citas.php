<?php
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/citas.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"  href="../css/btndlay.css?v=<?php echo time(); ?>">
    <script src="../js/citas.js?v=<?php echo time(); ?>" defer></script>
    <title>Citas</title>
</head>
<body>
    <div id="contenedor-p">
        <header>
            <nav>
              <a href="home.php">Inicio</a>
              <a href="">Citas</a>
              <a href="expedientes.php">Expedientes</a>
              <a href="inicio.php">Cerrar sesión</a>
              <a href="usuarios.php">Usuarios</a>
            </nav>
        </header>
    </div>
    <div id="cuerpo">
        <div id="iz">
            <div>
                <div id="contenedor-filtros">
                    <button class="filtro" id="form-cita">Agendar</button> 
                    <input class="filtro" type="text" id="buscador" placeholder="buscar">
                </div>
            </div>
            <br><hr>
            <div id="contenedor-citas">
                <?php
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM citas ORDER BY fecha DESC, hora DESC;");
                    $pdo -> execute();
                    $resultado=$pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '<div class="citas" data-id="'.$value['ID_cita'].'">
                    <div class="citas-1">
                        <div id="nombres">
                            <h3>'.$value['paciente'].'</h3>
                            <h4>'.$value['tutor'].'</h4>
                        </div>
                        <div id="fecha">
                            <h3>Día: '.$value['fecha'].'</h3>
                            <h4>hora: '.$value['hora'].'</h4>
                            <h5>tel: '.$value['telefono'].'</h5>
                        </div>
                        <div class="btn-m">';
                            if($value['ID_expediente']==0){
                                 echo'';
                            }else{
                                 echo'  <a id="v-expediente" class="btnn" href="expediente.php?expediente='.$value['ID_expediente'].'">
                                            Expediente
                                        </a>';
                            }echo '
                        </div>
                        <div id="botones">
                            <a class="btn" id="editar" href="actualizarc.php?cita='.$value['ID_cita'].'">
                                <img src="../iconos/icons8-editar-32.png" alt="">
                            </a> 
                            <form method="post" onsubmit="return borrar()" action="../php/eliminarc.php">
                                <input type="hidden" id="idE" name="cid" value="'.$value['ID_cita'].'">
                                <button class="btn" id="el">
                                    <img src="../iconos/icons8-eliminar-32.png" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="citas-2">
                        <div class="desc">
                            <p>'.$value['descrip'].'</p>
                        </div>
                        <div class="con-con">
                            <label class="switch">
                                <input type="checkbox" class="confirmar">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    </div>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
<script>
    function borrar(){
        return window.confirm("¿Desea eliminar la cita?");
    }
</script>
</html>
