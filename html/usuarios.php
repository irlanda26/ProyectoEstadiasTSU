<?php
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/usuarios.css?v=<?php echo time(); ?>">
    <script src="../js/usuarios.js?v=<?php echo time(); ?>" defer></script>
    <title>Usuarios</title>
</head>
<body>
    <div id="contenedor-p">
        <header>
            <nav>
              <a href="home.php">Inicio</a>
              <a href="citas.php">Citas</a>
              <a href="expedientes.php">Expedientes</a>
              <a href="inicio.php">Cerrar sesión</a>
              <a href="">Usuarios</a>
            </nav>
          </header>
       </div>
    <div id="cuerpo">
        <div id="contenedor-principal">
        <table class="tablota" border="1">
            <thead>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </thead>
            <tbody>
                <?php
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM usuarios");
                    $pdo -> execute();
                    $resultado=$pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '<tr>
                        <td>'.$value['nombre'].'</td>
                        <td>'.$value['apellido'].'</td>
                        <td>
                        <div class="btn-t">
                            <a id="editar"  href="usuarios.php?usuario='.$value['idusuarios'].'">
                                <img src="../iconos/icons8-editar-32.png" alt="">
                            </a>
                        </div> 
                        </td>
                        <td>
                            <form method="post" action="../php/eliminar.php" onsubmit="return borrar()">
                                <input type="hidden" id="idE" name="uid" value="'.$value['idusuarios'].'">
                                <button class="btn-t">
                                    <img src="../iconos/icons8-eliminar-32.png" alt="">
                                </button>
                            </form>
                        </td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table><br>        
        <div id="contenedor-agregar">
        <?php
            if (isset($_GET['usuario'])) {
                $usuarioId = $_GET['usuario'];
                $pdo = ConexionBD::cBD()->prepare("SELECT * FROM usuarios WHERE idusuarios=:id");
                $pdo->bindParam(':id', $usuarioId, PDO::PARAM_INT);
                $pdo->execute();
                $resultado = $pdo->fetchAll();
                foreach ($resultado as $key => $value) {
                    echo '
                    <div id="contra">
                        <div style="width: 90%;">
                            <form method="post" action="usuarios.php">
                                <label>Contraseña:</label>
                                <input type="password" name="con">
                                <input type="hidden" value="'.$value['idusuarios'].'" name="idu">
                                <button type="submit" class="in">Ingresar</button>
                            </form>
                        </div>
                        <div class="conx">
                            <button onclick="cancelarAc()" class="x">X</button>
                        </div> 
                    </div>';
                }
            }

            if (isset($_POST['idu']) && isset($_POST['con'])) {
                $idu = $_POST['idu'];
                $con = $_POST['con'];

                $pdo = ConexionBD::cBD()->prepare("SELECT idusuarios, pass FROM usuarios WHERE idusuarios=:idu");
                $pdo->bindParam(":idu", $idu, PDO::PARAM_INT);
                $pdo->execute();
                $resultado = $pdo->fetch(PDO::FETCH_ASSOC);

                if ($resultado && password_verify($con, $resultado['pass'])) {
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM usuarios WHERE idusuarios=:id");
                    $pdo->bindParam(':id', $idu, PDO::PARAM_INT);
                    $pdo->execute();
                    $resultado = $pdo->fetchAll();
                    foreach ($resultado as $key => $value) {
                        echo '
                        <div id="t-agregar">
                            <table class="tablota" border="1" id="t-act">
                                <thead>
                                    <td>Nombre:</td>
                                    <td>Apellido:</td>
                                    <td></td>
                                    <td></td>
                                </thead>
                                <tbody>
                                    <form id="editar-u" method="post" action="../php/actualizar.php">
                                        <td>
                                            <input type="text" id="nombreE" name="nombre" value="'.$value['nombre'].'">
                                            <input type="hidden" id="idE" name="E" value="'.$value['idusuarios'].'">
                                        </td>
                                        <td>
                                            <input type="text" id="apellidoE" name="apellido" value="'.$value['apellido'].'">
                                        </td>
                                        <td>
                                            <input type="submit" class="enviar">
                                        </td>
                                    </form>
                                    <td>
                                        <button class="ca" onclick="cancelarAc()">Cancelar</button>
                                    </td>
                                </tbody>
                            </table>
                            <br>
                        </div>';}
                } else {
                    echo '
                    <div id="inco">
                        <div id="con-cont">
                            <p>Contraseña incorrecta</p>
                            <a href="#" onclick="mostrarFormulario()">¿Olvidaste tu contraseña?</a><br><br>
                            <a href="usuarios.php?usuario='.$idu.'" class="in">Reintentar</a>
                        </div>
                        <div class="conx">
                            <button onclick="cancelarAc()" class="x">X</button>
                        </div>
                    </div>
                    <div id="contenedor-actcon" style="display: none;">
                        <form method="post" action="usuarios.php">
                            <label>Ingrese su nueva contraseña</label><br>
                            <input type="password" name="cnueva" required><br>
                            <label>Confirmar contraseña</label><br>
                            <input type="password" name="confi" required>
                            <input type="hidden" name="idcn" value="'.$idu.'">
                            <div style="display: flex;">
                                <button class="ba" type="submit">Actualizar</button>
                                <button class="ba" onclick="cancelarAc()">Cancelar</button>
                            </div>
                        </form> 
                    </div>';
                }
            }

            if (isset($_POST['cnueva']) && isset($_POST['confi']) && isset($_POST['idcn'])) {
                $passn = $_POST['cnueva'];
                $conpass = $_POST['confi'];
                $idcn = $_POST['idcn'];

                if ($passn === $conpass) {
                    $hpassn = password_hash($passn, PASSWORD_BCRYPT);

                    $pdo = ConexionBD::cBD()->prepare("UPDATE usuarios SET pass=:vpassn WHERE idusuarios=:idcn");
                    $pdo->bindParam(":vpassn", $hpassn, PDO::PARAM_STR);
                    $pdo->bindParam(":idcn", $idcn, PDO::PARAM_INT);

                    if ($pdo->execute()) {
                        echo '
                        <script>
                            alert("Contraseña actualizada correctamente");
                            window.location.href="usuarios.php";
                        </script>';
                    } else {
                        echo 'Error al actualizar la contraseña.';
                    }
                } else {
                    echo 'La contraseña no coincide.';
                }
            } 
        ?>
        </div>
        <button id="crear">Crear</button>
        </div>
        <div id="contenedor-crear">
            <form method="post" action="../php/agregar.php" id="form-crear">
                <table class="tablota1" border="1">
                    <thead>
                        <td>Nombre:</td>
                        <td>Apellido:</td>
                        <td>contraseña</td>
                        <td></td>
                    </thead>
                    <tbody>
                        <td>
                            <input type="text" id="nombre" name="nombre">
                        </td>
                        <td>
                            <input type="text" id="apellido" name="apellido">
                        </td>
                        <td>
                            <input type="text" id="pass" name="pass">
                        </td>
                        <td>
                            <button class="ca">Crear</button>
                        </td>
                    </tbody>
                </table>
            </form> 
            <div class="conxx">
                <button class="x" onclick="cerrarf()">X</button>
            </div>
    </div>
</body>
</html>