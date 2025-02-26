<?php
require 'conexion.php';
if(isset( $_POST['paciente']) && isset($_POST['fecha']) && isset($_POST['edad']) && isset($_POST['n-hermano']) &&
isset($_POST['l-nacimiento']) && isset($_POST['residencia']) && isset($_POST['calle']) && isset($_POST['numero']) &&
isset($_POST['colonia']) && isset($_POST['tel']) && isset($_POST['cel']) && isset($_POST['cel2']) && isset($_POST['madre']) &&
isset($_POST['ocupacion-m']) && isset($_POST['padre']) && isset($_POST['ocupacion-p']) && isset($_POST['motivo']) &&
isset($_POST['f-nacimiento']) && isset($_POST['vacunacion']) && isset($_POST['habitos']) && isset($_POST['n-lavado']) &&
isset($_POST['quien']) && isset($_POST['escuela']) && isset($_POST['grado']) && isset($_POST['experiencias']) && isset($_POST['recomendacion']) &&
isset($_POST['fechaf']) && isset($_POST['nombref']))
{
$paciente = $_POST['paciente']; 
$fecha = $_POST['fecha']; 
$edad = $_POST['edad'];
$n_hermano = $_POST['n-hermano'];
$l_nacimiento = $_POST['l-nacimiento'];
$residencia = $_POST['residencia'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$tel = $_POST['tel'];
$cel = $_POST['cel'];
$cel2 = $_POST['cel2'];
$madre = $_POST['madre'];
$ocupacion_m = $_POST['ocupacion-m'];
$padre = $_POST['padre'];
$ocupacion_p = $_POST['ocupacion-p'];
$motivo = $_POST['motivo'];
$f_nacimiento = $_POST['f-nacimiento'];
$vacunacion = $_POST['vacunacion'];
$habitos = $_POST['habitos'];
$n_lavado = $_POST['n-lavado'];
$quien = $_POST['quien'];
$escuela = $_POST['escuela'];
$grado = $_POST['grado'];
$experiencias = $_POST['experiencias'];
$recomendacion = $_POST['recomendacion']; 
    
try {
    $conn = ConexionBD::cBD();
    $pdo = $conn ->prepare("INSERT INTO expediente (nombre_paciente, fecha, edad, lu_nacimiento, lu_residencia, no_hermano, motivo_consulta, calle, tel_casa, celular, celular_2, nombre_m, nombre_p, ocupacion_m, ocupacion_p, no_calle, colonia, f_nacimiento, vacunacion, habitos, n_lavado, quien, escuela, grado, experiencias, recomendacion)
        VALUES (:vnombre_paciente, :vfecha, :vedad, :vlu_nacimiento, :vlu_residencia, :vno_hermano, :vmotivo_consulta, :vcalle, :vtel_casa, :vcelular, :vcelular_2, :vnombre_m, :vnombre_p, :vocupacion_m, :vocupacion_p, :vno_calle, :vcolonia, :vf_nacimiento, :vvacunacion, :vhabitos, :vn_lavado, :vquien, :vescuela, :vgrado, :vexperiencias, :vrecomendacion)");
    $pdo -> bindParam(":vnombre_paciente", $paciente, PDO::PARAM_STR);
    $pdo -> bindParam(":vfecha", $fecha, PDO::PARAM_STR);
    $pdo -> bindParam(":vedad", $edad, PDO::PARAM_INT);
    $pdo -> bindParam(":vlu_nacimiento", $l_nacimiento, PDO::PARAM_STR);
    $pdo -> bindParam(":vlu_residencia", $residencia, PDO::PARAM_STR);
    $pdo -> bindParam(":vno_hermano", $n_hermano, PDO::PARAM_INT);
    $pdo -> bindParam(":vmotivo_consulta", $motivo, PDO::PARAM_STR);
    $pdo -> bindParam(":vcalle", $calle, PDO::PARAM_STR);
    $pdo -> bindParam(":vtel_casa", $tel, PDO::PARAM_STR);
    $pdo -> bindParam(":vcelular", $cel, PDO::PARAM_STR);
    $pdo -> bindParam(":vcelular_2", $cel2, PDO::PARAM_STR);
    $pdo -> bindParam(":vnombre_m", $madre, PDO::PARAM_STR);
    $pdo -> bindParam(":vnombre_p", $padre, PDO::PARAM_STR);
    $pdo -> bindParam(":vocupacion_m", $ocupacion_m, PDO::PARAM_STR);
    $pdo -> bindParam(":vocupacion_p", $ocupacion_p, PDO::PARAM_STR);
    $pdo -> bindParam(":vno_calle", $numero, PDO::PARAM_INT);
    $pdo -> bindParam(":vcolonia", $colonia, PDO::PARAM_STR);
    $pdo -> bindParam(":vf_nacimiento", $f_nacimiento, PDO::PARAM_STR);
    $pdo -> bindParam(":vvacunacion", $vacunacion, PDO::PARAM_STR);
    $pdo -> bindParam(":vhabitos", $habitos, PDO::PARAM_STR);
    $pdo -> bindParam(":vn_lavado", $n_lavado, PDO::PARAM_INT);
    $pdo -> bindParam(":vquien", $quien, PDO::PARAM_STR);
    $pdo -> bindParam(":vescuela", $escuela, PDO::PARAM_STR);
    $pdo -> bindParam(":vgrado", $grado, PDO::PARAM_STR);
    $pdo -> bindParam(":vexperiencias", $experiencias, PDO::PARAM_STR);
    $pdo -> bindParam(":vrecomendacion", $recomendacion, PDO::PARAM_STR);
   
    if ($pdo->execute()) {
        $ID_expediente = $conn->lastInsertId();        

        $antecedentes = [
            "diabetes" => isset($_POST['diabetes']) ? "Diabetes" : null,
            "presion" => isset($_POST['presion']) ? "Presión alta" : null,
            "corazon" => isset($_POST['corazon']) ? "Problemas del corazón, hígado y riñon" : null,
            "mental" => isset($_POST['mental']) ? "Enfermedades mentales" : null,
            "epilep" => isset($_POST['epilep']) ? "Epilepsia y/o convulsiones" : null,
            "asma" => isset($_POST['asma']) ? "Asma" : null,
            "san" => isset($_POST['san']) ? "Enfermedades sanguíneas" : null,
            "endo" => isset($_POST['endo']) ? "Enfermedades endocrinas" : null,
            "cancer" => isset($_POST['cancer']) ? "Cáncer" : null
        ];
        
        foreach ($antecedentes as $antecedente => $valor) {
            if ($valor !== null) {
                $involucrados = isset($_POST[$antecedente . '-in']) ? $_POST[$antecedente . '-in'] : null;
                $pdo2 = $conn->prepare("INSERT INTO antecedentes_heredofa (antecedente, quienes, ID_expediente)
                    VALUES (:vantecedente, :vinvolucrados, :vid_expediente)");
                $pdo2->bindParam(":vantecedente", $valor, PDO::PARAM_STR);
                $pdo2->bindParam(":vinvolucrados", $involucrados, PDO::PARAM_STR);
                $pdo2->bindParam(":vid_expediente", $ID_expediente, PDO::PARAM_INT);
                $pdo2->execute();
            }
        }
        $antecedentespp = [
            "asmap" => isset($_POST['asmap']) ? "Asma" : null,
            "alergia" => isset($_POST['alergia']) ? "Alergias (alimentos o medicamento)" : null,
            "neuro" => isset($_POST['neuro']) ? "Alteraciones neurológicas" : null,
            "cardio" => isset($_POST['cardio']) ? "Cardiopatías" : null,
            "higado" => isset($_POST['higado']) ? "Enfermedades de hígado o riñón" : null,
            "infancia" => isset($_POST['infancia']) ? "Enfermedades propias de la infancia" : null,
            "fiebre" => isset($_POST['fiebre']) ? "Fiebre reumática" : null,
            "endocrino" => isset($_POST['endocrino']) ? "Endocrinopatías" : null,
            "trauma" => isset($_POST['trauma']) ? "Traumarismos" : null,
            "tras" => isset($_POST['tras']) ? "Trastornos de lenguaje" : null,
            "otra" => isset($_POST['otra']) ? "Otras" : null,
            "infe" => isset($_POST['infe']) ? "Infecciones frecuentes" : null
        ];
        foreach ($antecedentespp as $antecedentepp => $valorpp) {
            if ($valorpp !== null) {
                $desc = isset($_POST[$antecedentepp . '-in']) ? $_POST[$antecedentepp . '-in'] : null;
                $pdo3 = $conn->prepare("INSERT INTO an_personales_p (antecedentes, descripcion_a, ID_expediente)
                    VALUES (:vantecedentes, :vdescripciona, :vid_expediente)");
                $pdo3->bindParam(":vantecedentes", $valorpp, PDO::PARAM_STR);
                $pdo3->bindParam(":vdescripciona", $desc, PDO::PARAM_STR);
                $pdo3->bindParam(":vid_expediente", $ID_expediente, PDO::PARAM_INT);
                $pdo3->execute();
            }
        }
      $diag = $_POST['dia-desc'];

        $imagenCodificada = $_POST["imagen"];
        $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", $imagenCodificada);
        $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
        $nombreImagen = "imagen_" . uniqid() . ".png";
        file_put_contents($nombreImagen, $imagenDecodificada);
        echo json_encode($nombreImagen);

        $pdo4 = $conn -> prepare("INSERT INTO diagnostico (notas, img, ID_expediente)
            VALUES (:vnotasd, :vimg, :vid_expediente)");
        $pdo4 -> bindParam(":vnotasd", $diag, PDO::PARAM_STR);
        $pdo4 -> bindParam(":vimg", $nombreImagen, PDO::PARAM_STR);
        $pdo4 -> bindParam(":vid_expediente", $ID_expediente, PDO::PARAM_INT);
        $pdo4 ->execute();

        $exploraciones = [
            "linea" => isset($_POST['linea']) ? "Línea media" : null,
            "planos" => isset($_POST['planos']) ? "Planos terminales" : null,
            "angle" => isset($_POST['angle']) ? "Angle" : null,
            "canina" => isset($_POST['canina']) ? "Relacion canina" : null,
            "ver" => isset($_POST['ver']) ? "Sobremordida vertical" : null,
            "hor" => isset($_POST['hor']) ? "Sobremordida horizontal" : null,
            "prima" => isset($_POST['prima']) ? "Espacios primates" : null,
            "fisio" => isset($_POST['fisio']) ? "Espacios fisiológicos" : null,
            "cruz" => isset($_POST['cruz']) ? "Mordida cruzada" : null,
            "abierta" => isset($_POST['abierta']) ? "Mordida abierta" : null,
            "mal" => isset($_POST['mal']) ? "Mal posición dentaria" : null,
            "diastema" => isset($_POST['diastema']) ? "Diastema" : null,
            "secuencia" => isset($_POST['secuencia']) ? "Secuencia anormal" : null,
            "perdida" => isset($_POST['perdida']) ? "Perdida prematura" : null,
            "reten" => isset($_POST['reten']) ? "Retención prolongada" : null,
            "erupcion" => isset($_POST['erupcion']) ? "Erupción retardada" : null,
            "proxi" => isset($_POST['proxi']) ? "Falta de contacto proximal" : null
        ];
    
        foreach ($exploraciones as $exploracion => $valore) {
            if ($valore !== null) {
                $desc = isset($_POST[$exploracion . '-in']) ? $_POST[$exploracion . '-in'] : null;
                $pdo5 = $conn->prepare("INSERT INTO exploracion (nombre, descripcion, ID_expediente)
                                                        VALUES (:vnombre, :vdescripcion, :vid_expediente)");
                $pdo5 ->bindParam(":vnombre", $valore, PDO::PARAM_STR);
                $pdo5 ->bindParam(":vdescripcion", $desc, PDO::PARAM_STR);
                $pdo5 ->bindParam(":vid_expediente", $ID_expediente, PDO::PARAM_INT);
                $pdo5 ->execute();
            }
        } 
        $fechaf = $_POST['fechaf'];
        $nombref = $_POST['nombref']; 
        $nombret = $_POST['nombret']; 

        $imagenCodificada2 = $_POST["imagen2"];
        $imagenCodificadaLimpia2 = str_replace("data:image/png;base64,", "", $imagenCodificada2);
        $imagenDecodificada2 = base64_decode($imagenCodificadaLimpia2);
        $nombreImagen2 = "imagen2_" . uniqid() . ".png";
        file_put_contents($nombreImagen2, $imagenDecodificada2);

        $pdo6 = $conn->prepare("INSERT INTO consentimiento (fechac, nombrec, ID_expediente, img_firma, nombret) VALUES (:vfechac, :vnombrec, :vid_expediente, :vimgf, :vnombret)");
        $pdo6 -> bindParam(":vfechac", $fechaf, PDO::PARAM_STR);
        $pdo6 -> bindParam(":vnombrec", $nombref, PDO::PARAM_STR);
        $pdo6 -> bindParam(":vimgf", $nombreImagen2, PDO::PARAM_STR);
        $pdo6 -> bindParam(":vid_expediente", $ID_expediente, PDO::PARAM_INT);
        $pdo6 -> bindParam(":vnombret", $nombret, PDO::PARAM_STR);
        $pdo6 -> execute();
    }
}catch (Exception $e) {
    echo 'Error al crear expediente: ' . $e->getMessage();
}
}
?>