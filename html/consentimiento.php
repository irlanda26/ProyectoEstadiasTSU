<?php
    require '../php/conexion.php'
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/expediente.css?v=<?php echo time(); ?>">
    <title>Consentimiento informado y Aceptación del tratamiento</title>
</head>
<style>
    p {
    text-align: justify;
    }
</style>
<body>
<?php
    $expe = $_GET['expediente'];
    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM consentimiento WHERE ID_expediente=:vexpe");
    $pdo -> bindParam(":vexpe", $expe, PDO::PARAM_INT);
    $pdo -> execute();
    $resultado = $pdo -> fetchAll();
    foreach($resultado as $key => $value) {
        echo '
    <a class="con" href="expediente.php?expediente='.$value['ID_expediente'].'">Volver</a>
    <div style="background-color: #ABBE89; padding: 20px; margin: 20px; border-radius: 10px;">
        <div style="background-color: #fff; padding: 30px;">
            <div style="display: flex; justify-content: end;">
               '.$value['fechac'].' 
            </div>
            <p>
                Con esta fecha el Cirujano Dentista con Maestría en Estomatología Pediátrica le realizó una 
                historia clínica a mi hijo(a) '.$value['nombrec'].' en la cual respondí de forma verídica y se
                me informó de los posibles riesgos y complicaciones, así como también de los beneficios y alternativas
                del plan de tratamiento según el diagnóstico de mi hijo(a).
            </p>
            <p>
                Manifiesto que se me informó de las posibles consecuencias de no realizar el tratamiento, así como el 
                riesgo que implican las reacciones alérgicas, hemorrágicas, infecciones, reacciones secundarias al empleo 
                de medicamentos, accidentes derivados de la aplicación de anestésicos locales.
            </p>
            <p>
                Asumo los riesgos que por la naturaleza de las prácticas odontológicas se pueden derivar y que no son posibles 
                de anticipar. Entiendo que durante el procedimiento propuesto pueden presentarse condiciones imprevistas que a su 
                vez requieran de procedimientos adicionales, por lo que autorizo que en caso de ser necesario se realicen. 
                Comprendo que siempre se efectuaran empleando los medios y procedimientos técnicos actuales y más adecuados buscando 
                el mejor beneficio para mi hijo(a).
            </p>
            <p>
                Se me ha informado de las diferentes técnicas de conducta aplicadas en la atención odontológica infantil, entre las 
                cuales se encuentran, la restricción física, control de voz, técnica de decir-mostrar-hacer, entre otras, lo anterior
                con el fin de disminuir los niveles de ansiedad de mi hijo(a).
            </p>
            <p>
                Con el presente documento doy mi consentimiento al Estomatólogo Pediatra para efectuar a mi hijo(a) las intervensiones 
                indicadas de acuerdo al plan de tratamiento.
            </p>
            <div style="display: flex;">
                <div style="width: 50%; height: 80%; margin-right: 20px;">
                    <img id="canva-firma" src="../php/'.$value['img_firma'].'">
                    <p>'.$value['nombret'].'</p>
                    <h4>Nombre y firma del padre o tutor</h4>
                </div>
                <div style="width: 50%;">
                    <img src="../iconos/firma.jpg" id="foto-firma" style="width: 100%;">
                    <h4>M.E.P NELIDA DANIELA CUELLAR</h4>
                </div>
            </div>
        </div>
    </div>';}
?>
<button class="con" style="border:none; margin:0; height: 30px; " onclick="window.print()">Guardar</button>
</body>
</html>