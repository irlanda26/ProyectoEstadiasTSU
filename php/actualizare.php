<?php
require 'conexion.php';

$id = $_POST['ide'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$edad = $_POST['edad'];
$f_naci = $_POST['f_naci'];
$lugar_n = $_POST['lugar_n'];
$lugar_r = $_POST['lugar_r'];
$n_her = $_POST['n_her'];
$calle = $_POST['calle'];
$nc = $_POST['nc'];
$colonia = $_POST['colonia'];
$cel = $_POST['cel'];
$cel2 = $_POST['cel2'];
$madre = $_POST['madre'];
$ocupacion_m = $_POST['ocupacion_m'];
$padre = $_POST['padre'];
$ocupacion_p = $_POST['ocupacion_p'];
$vacunacion = $_POST['vacunacion'];
$habitos = $_POST['habitos'];
$n_l = $_POST['n_l'];
$quien = $_POST['quien'];
$escuela = $_POST['escuela'];
$grado = $_POST['grado'];
$experi = $_POST['experi'];
$recomendacion = $_POST['recomendacion'];

if(isset($_POST['quien']) && isset($_POST['idah'])) {
    $quienp = $_POST['quienp'];
    $idah = $_POST['idah'];

    $here = ConexionBD::cBD()->prepare("UPDATE antecedentes_heredofa SET quienes = :vquienp WHERE ID_antecedente = :idah");
    foreach ($idah as $ida) {
        $quienn = $quienp[$ida];
        $here->bindParam(":idah", $ida, PDO::PARAM_INT);
        $here->bindParam(":vquienp", $quienn, PDO::PARAM_STR);
        $here->execute();
    }
};

if(isset($_POST['descria']) && ($_POST['idpp'])) {
    $descria = $_POST['descria'];
    $idpp = $_POST['idpp'];

    $pato  = ConexionBD::cBD()->prepare("UPDATE an_personales_p SET descripcion_a = :vdescria WHERE ID_antecedentes_pp = :idpp");
    foreach ($idpp as $idp) {
        $descrian = $descria[$idp];
        $pato->bindParam(":idpp", $idp, PDO::PARAM_INT);
        $pato->bindParam(":vdescria", $descrian, PDO::PARAM_STR);
        $pato->execute();
    }
}

if(isset($_POST['notasd']) && isset($_POST['idn'])) {
    $notasd = $_POST['notasd'];
    $idn = $_POST['idn'];

    if (isset($_POST["imagen"])) {
        $imagenCodificada = $_POST["imagen"];
        $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", $imagenCodificada);
        $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
        $nombreImagen = "imagen_" . uniqid() . ".png";
        file_put_contents("../php/" . $nombreImagen, $imagenDecodificada);
    } else {
        $nombreImagen = null;  // En caso de que no se haya subido ninguna imagen
    }

    $diac = ConexionBD::cBD()->prepare("UPDATE diagnostico SET notas = :vnotas, img = :vimg WHERE ID_diagnostico = :idn");
    $diac->bindParam(":idn", $idn, PDO::PARAM_INT);
    $diac -> bindParam(":vimg", $nombreImagen, PDO::PARAM_STR);
    $diac->bindParam(":vnotas", $notasd, PDO::PARAM_STR);
    $diac->execute();
}

if(isset($_POST['exdesc']) && isset($_POST['idex'])) {
    $exdesc = $_POST['exdesc'];
    $idex = $_POST['idex'];

    $expo = ConexionBD::cBD()->prepare("UPDATE exploracion SET descripcion = :vexdesc WHERE ID_exploracion = :idex");
    foreach ($idex as $ide) {
        $xdesc = $exdesc[$ide];
        $expo->bindParam(":idex", $ide, PDO::PARAM_INT);
        $expo->bindParam(":vexdesc", $xdesc, PDO::PARAM_STR);
        $expo->execute();
    }
}

if(isset($_POST['fechan']) && isset($_POST['notac']) && isset($_POST['idnc'])) {
    $fechan = $_POST['fechan'];
    $notac = $_POST['notac'];
    $idnc = $_POST['idnc'];

    $nota = ConexionBD::cBD()->prepare("UPDATE notas SET fecha = :vfecha, notac = :vnotac WHERE idnotas = :idon");
    foreach ($idnc as $idno) {
        $fechano = $fechan[$idno];
        $notacl = $notac[$idno];
        $nota->bindParam(":idon", $idno, PDO::PARAM_INT);
        $nota->bindParam(":vfecha", $fechano, PDO::PARAM_STR);
        $nota->bindParam(":vnotac", $notacl, PDO::PARAM_STR);
        $nota->execute();

    }
}
    $pdo = ConexionBD::cBD();

    $expe = $pdo->prepare("UPDATE expediente SET nombre_paciente = :vnombre, fecha = :vfecha, edad = :vedad, f_nacimiento = :vf_naci, lu_nacimiento = :vlugar_n, lu_residencia = :vlugar_r, no_hermano = :vn_her, calle = :vcalle, no_calle = :vnc, colonia = :vcolonia, celular = :vcel, celular_2 = :vcel2, nombre_m = :vmadre, ocupacion_m = :vocupacion_m, nombre_p = :vpadre, ocupacion_p = :vocupacion_p, vacunacion = :vvacunacion, habitos = :vhabitos, n_lavado = :vn_l, quien = :vquien, escuela = :vescuela, grado = :vgrado, experiencias = :vexperi, recomendacion = :vrecomendacion WHERE ID_expediente = :vid");
    $expe->bindParam(":vid", $id, PDO::PARAM_INT);
    $expe->bindParam(":vnombre", $nombre, PDO::PARAM_STR);
    $expe->bindParam(":vfecha", $fecha, PDO::PARAM_STR);
    $expe->bindParam(":vedad", $edad, PDO::PARAM_INT);
    $expe->bindParam(":vf_naci", $f_naci, PDO::PARAM_STR);
    $expe->bindParam(":vlugar_n", $lugar_n, PDO::PARAM_STR);
    $expe->bindParam(":vlugar_r", $lugar_r, PDO::PARAM_STR);
    $expe->bindParam(":vn_her", $n_her, PDO::PARAM_INT);
    $expe->bindParam(":vcalle", $calle, PDO::PARAM_STR);
    $expe->bindParam(":vnc", $nc, PDO::PARAM_STR);
    $expe->bindParam(":vcolonia", $colonia, PDO::PARAM_STR);
    $expe->bindParam(":vcel", $cel, PDO::PARAM_STR);
    $expe->bindParam(":vcel2", $cel2, PDO::PARAM_STR);
    $expe->bindParam(":vmadre", $madre, PDO::PARAM_STR);
    $expe->bindParam(":vocupacion_m", $ocupacion_m, PDO::PARAM_STR);
    $expe->bindParam(":vpadre", $padre, PDO::PARAM_STR);
    $expe->bindParam(":vocupacion_p", $ocupacion_p, PDO::PARAM_STR);
    $expe->bindParam(":vvacunacion", $vacunacion, PDO::PARAM_STR);
    $expe->bindParam(":vhabitos", $habitos, PDO::PARAM_STR);
    $expe->bindParam(":vn_l", $n_l, PDO::PARAM_INT);
    $expe->bindParam(":vquien", $quien, PDO::PARAM_STR);
    $expe->bindParam(":vescuela", $escuela, PDO::PARAM_STR);
    $expe->bindParam(":vgrado", $grado, PDO::PARAM_STR);
    $expe->bindParam(":vexperi", $experi, PDO::PARAM_STR);
    $expe->bindParam(":vrecomendacion", $recomendacion, PDO::PARAM_STR);
    $expe->execute();

    echo json_encode(["success" => true, "message" => "Datos actualizados correctamente"]);
    exit;
?>