<?php
  require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/expediente.css?v=<?php echo time(); ?>">
    <script src="../js/expediente.js?v=<?php echo time(); ?>" defer></script>
    <title>expediente</title>
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
       <div id="container-p-c"> 
        <div id="container-t-c">
          <div id="tipo-dato"> 
            <button class="btn-datos" id="btn-datos">Datos</button>
            <button class="btn-datos" id="btn-heredofa">A. heredofamiliares</button>
            <button class="btn-datos" id="btn-pato">A. patológicos</button>
            <button class="btn-datos" id="btn-personal">A. personales</button>
            <button class="btn-datos" id="btn-diag">Diagnóstico</button>
            <button class="btn-datos" id="btn-notas">Notas clínicas</button>
          </div>
          <div id="info">
          <?php
            $expedienteId = ($_GET['expediente']);
              $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente WHERE ID_expediente=:idex");
              $pdo -> bindParam(":idex", $expedienteId, PDO::PARAM_INT);
              $pdo -> execute();
              $resultado = $pdo -> fetchAll();
              foreach($resultado as $key => $value) {
                echo
              '<div class="arriba">
              <h2>'.$value['nombre_paciente'].'</h2>
              <div id="fecha">
                <h6>'.$value['fecha'].'</h6>
              </div>
            </div>
            <div id="datos">
              <div class="uno">
                <p>Edad: '.$value['edad'].'</p>
                <p>Fecha de nacimiento: '.$value['f_nacimiento'].'</p>
                <p>Lugar de nacimiento: '.$value['lu_nacimiento'].'</p>
                <p>Lugar de residencia: '.$value['lu_residencia'].'</p>
                <p>No. hermano que ocupa:</p><p> '.$value['no_hermano'].'</p>
              </div>
              <div class="dos">
                <p>Dirección: '.$value['calle'].' No.'.$value['no_calle'].', '.$value['colonia'].'</p>
                <p>Celular: '.$value['celular'].' o '.$value['celular_2'].'</p>
                <p>Madre: '.$value['nombre_m'].' Ocupación: '.$value['ocupacion_m'].'</p>
                <p>Padre: '.$value['nombre_p'].' Ocupación: '.$value['ocupacion_p'].'</p>
              </div>
            </div>';
              }?>
            <div id="heredofa">
              <div class="uno-2">
                <?php
                  $expedienteId = ($_GET['expediente']);
                  $pdo = ConexionBD::cBD()->prepare("SELECT * FROM antecedentes_heredofa WHERE ID_expediente=:ida");
                  $pdo -> bindParam(':ida', $expedienteId, PDO::PARAM_INT);
                  $pdo -> execute();
                  $resultado = $pdo -> fetchAll();
                  foreach($resultado as $key => $value) {
                    echo
                    '<p>'.$value['antecedente'].': '.$value['quienes'].'</p>';
                  }?>
              </div>
            </div>
            <div id="pato">
              <div class="uno-2">
                <?php
                $expedienteId = ($_GET['expediente']);
                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM an_personales_p WHERE ID_expediente=:idp");
                $pdo -> bindParam(':idp', $expedienteId, PDO::PARAM_INT);
                $pdo -> execute();
                $resultado = $pdo -> fetchAll();
                foreach($resultado as $key => $value) {
                  echo
                '<p>'.$value['antecedentes'].': '.$value['descripcion_a'].'</p>';
                }?>
              </div>
            </div>
            <div id="personal">
              <?php
              $expedienteId = ($_GET['expediente']);
              $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente WHERE ID_expediente=:idex");
              $pdo -> bindParam(':idex', $expedienteId, PDO::PARAM_INT);
              $pdo -> execute();
              $resultado = $pdo -> fetchAll();
              foreach($resultado as $key => $value) {
                echo
                  '<div class="uno">
                    <p>Esquema de vacunación: '.$value['vacunacion'].'</p>
                    <p>Hábitos: '.$value['habitos'].'</p>
                    <p>Cuantas veces se lava los dientes: '.$value['n_lavado'].'</p>
                    <p>Quien realiza el cepillado: '.$value['quien'].'</p>
                    <p>Escuela: '.$value['escuela'].'</p>
                  </div>
                  <div class="dos">
                    <p>Grado que cursa: '.$value['grado'].'</p>
                    <p>Experiencias desagradables con medicos o dentistas: '.$value['experiencias'].'</p>
                    <p>Quien lo recomendo o como se entero del consultorio?: '.$value['recomendacion'].'</p>
                  </div>';
                }?>
            </div>
            <div id="diag">
              <div class="contenedor-diag">
              <?php
                $expedienteId = ($_GET['expediente']);
                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM diagnostico WHERE ID_expediente=:idd");
                $pdo -> bindParam(':idd', $expedienteId, PDO::PARAM_INT);
                $pdo -> execute();
                $resultado = $pdo -> fetchAll();
                foreach($resultado as $key => $value) { echo
                '<div class="tres">
                  <img src="../php/'.$value['img'].'" id="img">
                </div>
                <div class="cuatro">
                  <p>'.$value['notas'].'</p><br>';
                }?>
              <?php
                $expedienteId = ($_GET['expediente']);
                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM exploracion WHERE ID_expediente=:ide");
                $pdo -> bindParam(':ide', $expedienteId, PDO::PARAM_INT);
                $pdo -> execute();
                $resultado = $pdo -> fetchAll();
                foreach($resultado as $key => $value) {
                  echo
                '<h4>Exploración intraoral</h4>
                <p>'.$value['nombre'].': '.$value['descripcion'].'</p>';
                }?>
                </div>
              </div>
            </div>
            <div id="notas">
              <div class="si">
              <?php 
              $expedienteId = ($_GET['expediente']);
              $pdo = ConexionBD::cBD()->prepare("SELECT * FROM notas WHERE ID_expediente=:idn");
              $pdo -> bindParam(':idn', $expedienteId, PDO::PARAM_INT);
              $pdo -> execute();
              $resultado = $pdo -> fetchAll();
              foreach($resultado as $key => $value) {
                echo '<div class="n-text">
                        <h6>'.$value['fecha'].'</h6>
                        <p>'.$value['notac'].'</p><hr>
                      </div> ';
              }?>
                <div id="agregar">
                  <button id="nota-c" class="a" href="">Agregar nota</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="con-fnota">
        <form action="../php/crear-nota.php" method="post" class="quesillo">
          <label>Fecha:</label>
          <input type="date" name="fecha" id="">
          <label>Nota:</label>
          <input type="text" name="nota">
          <?php 
              $expedienteId = ($_GET['expediente']);
              $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente WHERE ID_expediente=:idex");
              $pdo -> bindParam(':idex', $expedienteId, PDO::PARAM_INT);
              $pdo -> execute();
              $resultado = $pdo -> fetchAll();
              foreach($resultado as $key => $value) {
                echo '
          <input type="hidden" value="'.$_GET['expediente'].'" name="idn">';}?>
          <button>Agregar</button>
        </form>
        <button id="x">X</button>
      </div>
      <div id="crud">
        <div id="actualizar">
          <div  class="cru">
            <?php
              $expedienteId = ($_GET['expediente']);
              $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente WHERE ID_expediente=:idex");
              $pdo -> bindParam(':idex', $expedienteId, PDO::PARAM_INT);
              $pdo -> execute();
              $resultado=$pdo -> fetchAll();
              if(!empty($resultado)) {
                  $value = $resultado[0];
                  echo 
                  '<a href="actualizare.php?expediente='.$value['ID_expediente'].'">Editar</a>';
              }?></div>
        </div>
        <div id="eliminar">
          <?php
          $expedienteId = ($_GET['expediente']);
          $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente WHERE ID_expediente=:idex");
          $pdo -> bindParam(':idex', $expedienteId, PDO::PARAM_INT);
          $pdo -> execute();
          $resultado=$pdo -> fetchAll();
          if(!empty($resultado)) {
            $value = $resultado[0];
            echo '<form action="../php/eliminarex.php" method="post" onsubmit="return borrar()">
            <input type="hidden" value="'.$value['ID_expediente'].'" name="iddeids">
            <button class="cru">Eliminar</button>
          </form>
        </div>
        <div class="cond">
          <a class="con" href="consentimiento.php?expediente='.$value['ID_expediente'].'">Firma de Consentimiento</a>
        </div>
      </div>
      ';
          }?>
        
</body>
<script>
    function borrar(){
        return window.confirm("¿Desea eliminar el expediente?");
    }
</script>
</html>