<?php
session_start();
require '../php/conexion.php';

if (isset($_POST['usu']) && isset($_POST['con'])) {
    $usu = $_POST['usu'];
    $con = $_POST['con'];

    $pdo = ConexionBD::cBD()->prepare("SELECT idusuarios, nombre, pass FROM usuarios WHERE nombre=:vnombre");
    $pdo->bindParam(":vnombre", $usu, PDO::PARAM_STR);
    $pdo->execute();
    $resultado = $pdo->fetch(PDO::FETCH_ASSOC);

    $men = "";

    if ($resultado) {
        if (password_verify($con, $resultado['pass'])) { 
            $_SESSION['id_usuario'] = $resultado['idusuarios'];
            header('Location: home.php');
            exit();
        } else {
            $men = "Contraseña incorrecta";
        }
    } else {
        $men = "Usuario no encontrado";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inicio.css?v=<?php echo time(); ?>">
    <title>Acceso</title>
</head>
<body>
    <div id="concon">
        <div id="contenedor-icono"><img id="icono" src="../iconos/icons8-candado-100.png"></div> 
    </div>
    <div id="contenedor-p">
        <div id="form">
            <h1 class="taco">Acceso</h1>
            <?php if (!empty($men)): ?>
                <p><?php echo $men; ?></p>
            <?php endif; ?>
            <form action="inicio.php" method="post">
            <div class="taco">
                <h3>Usuario</h3>
                <input type="text" id="usu" name="usu">
            </div>
            <div class="taco">
                <h3>Contraseña</h3>
                <input type="password" id="con" name="con">
            </div>
            <div class="btn">
                <button id="btn-ingresar">Ingresar</button>
            </div>
            </form>
        </div>
    </div>
    <div id="contenedor-ola">
        <div class="o1"></div>
        <div id="nose">
            <div class="o2"></div>
        </div>
        <div class="o1"></div>
    </div>
</body>
</html>