<?php 
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form-cita.css?v=<?php echo time(); ?>">
   
    <title>Agendar</title>
</head>
<body>
    <div id="contenedor-p">
     <header>
         <nav>
           <a href="home.php">Inicio</a>
           <a href="citas.php">Citas</a>
           <a href="expedientes.php">Expedientes</a>
           <a href="inicio.php">Cerrar sesión</a>
           <a href="usuarios.php">Usuarios</a>
         </nav>
       </header>
    </div>
    <div id="cuerpo">
    <div id="deco1">
        <img src="../iconos/cepillo1.png" alt="">
    </div>
    <div id="contenedor"> 
        <div id="contenedor-form">
            <div class="contenedor-mini"><br><br>
                <form id="buscador">
                <label>Agregar expediente</label><br>
                    <div class="nose">
                        <select class="js-example-basic-single" id="buscar" name="buscar">
                            <?php
                            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente");
                            $pdo -> execute();
                            $resultado=$pdo -> fetchAll();
                            foreach($resultado as $key => $value) {
                                echo '
                                <option value="'.$value['ID_expediente'].'">
                                    '.$value['nombre_paciente'].' | '.$value['f_nacimiento'].'
                                </option>';
                            }?>
                        </select>
                        <div class="cbtnb">
                            <button id="btn-b">Buscar</button> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="nose2">
                <label>
                    <input type="checkbox" id="check"> 
                    Aún no hay expediente
                </label>
            </div>
            <div class="con-datos">
            <form action="../php/agendar.php" method="post">
                <div class="contenedor-input">
                    <label>Paciente:</label>
                    <input type="text" class="indec" name="paciente" id="paciente">
                    <input type="hidden" class="indec" name="id_p" id="id_p">
                </div>
                <div class="contenedor-input3">
                <div class="contenedor-mini2">
                    <label>Tutor/padre de familia:</label><br>
                    <input type="text" class="indec" name="tutor" id="tutor">
                </div>
                <div class="contenedor-mini">
                        <label>No. Teléfono:</label><br>
                        <input type="text" class="indec" name="tel" id="tel">
                    </div>
                </div>
                <div class="contenedor-input2">
                    <div class="fecha">
                        <label>Fecha:</label><br>
                        <input type="date" class="indec" name="fecha"> 
                    </div>
                    <div class="fecha">
                        <label>Hora:</label><br>
                        <input type="time" class="indec" name="hora">
                    </div>
                </div>
                <div class="contenedor-input4">
                    <label>Motivo:</label>
                    <input type="text" class="indec" name="desc" id="desc">
                </div>
                <div class="button">
                    <button>Agendar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div id="deco2">
        <img src="../iconos/cepillo2.png">
    </div>
</div>
</body>
<link href="../js/select2.min.css" rel="stylesheet" />
<script src="../js/jquery-3.7.1.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/agendar.js?v=<?php echo time(); ?>"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
</html>