<?php
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"  href="../css/btndlay.css?v=<?php echo time(); ?>">
    <script src="../js/home.js?v=<?php echo time(); ?>" defer></script>
    <title>Principal</title>
</head>
<body>
   <div id="contenedor-p">
    <header>
        <nav>
          <a href="">Inicio</a>
          <a href="citas.php">Citas</a>
          <a href="expedientes.php">Expedientes</a>
          <a href="inicio.php">Cerrar sesión</a>
          <a href="usuarios.php">Usuarios</a>
        </nav>
      </header>
    </div>
    <div id="cuerpo">
    <div id="deco1">
        <div class="diente-i"></div>
        <div class="diente-i"></div>
        <div class="diente-i"></div>
        <div class="diente-i"></div>
        <div class="diente-i"></div>
    </div>
    <div id="contenedor">
        <h1>Citas próximas</h1>
        <div class="contenedor-citas">
        <?php
         $pdo = ConexionBD::cBD()->prepare("SELECT * FROM citas WHERE week(fecha, 1) = week(CURDATE(), 1) 
                                            AND year(fecha) = year(CURDATE()) AND fecha >= CURDATE() ORDER BY fecha ASC, hora ASC;");
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
                        echo' <a id="v-expediente" class="btnn" href="expediente.php?expediente='.$value['ID_expediente'].'">Expediente</a>';
                }
            echo '</div>
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
         }?>
         </div>
        <div id="botones">
            <button id="form-cita">Agendar cita</button> 
            <button id="form-expediente">Crear expediente</button>
        </div>
    </div>
    <div id="deco2">
        <div class="diente-d"></div>
        <div class="diente-d"></div>
        <div class="diente-d"></div>
        <div class="diente-d"></div>
        <div class="diente-d"></div>
    </div>
</div>
</body>
</html>