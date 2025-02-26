<?php
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form-expediente.css?v=<?php echo time(); ?>">
    
    <title>Crear expediente</title>
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
        <h2>Crear expediente</h2>
    <div id="contenedor-form">
<form method="post" enctype="multipart/form-data" id="form-expediente">
        <div class="contenedor-sec"> 
            <h3>Datos del niño(a):</h3> 
            <div class="linea">
                <div class="in">
                    Paciente:
                    <input type="text" id="paciente" name="paciente" required>
                </div>
                <div class="in">
                    Fecha:
                    <input type="date" id="fecha" name="fecha" required>
                </div>
            </div>
            <div class="linea">
                <div class="in">
                    fecha de nacimiento:
                    <input type="date" id="f-nacimiento" name="f-nacimiento" required>
                </div>
                <div class="in">
                    Edad:
                    <input type="text" id="edad" name="edad" required>
                </div>
                <div class="in">
                    No. hermano que ocupa:
                    <input type="text" id="n-hermano" name="n-hermano" required>
                </div>
            </div>
            <div class="linea">
                <div class="in">
                    Lugar de nacimiento:
                    <input type="text" id="l-nacimiento" name="l-nacimiento" required>
                </div>
                <div class="in">
                    Lugar de residencia:
                    <input type="text" id="residencia" name="residencia" required>
                </div>
            </div>
        </div>
        <div class="contenedor-sec">
            <h3>Datos de contacto</h3>
            <div class="linea">
                <div class="in">
                    Calle:
                    <input type="text" id="calle" name="calle" required>
                </div>
                <div class="in">
                    Numero:
                    <input type="text" id="numero" name="numero" required>
                </div>
                <div class="in">
                    Colonia:
                    <input type="text" id="colonia" name="colonia" required>
                </div>
            </div>
            <div class="linea">
                <div class="in">
                    Telefono de casa:
                    <input type="text" id="tel" name="tel">
                </div>
                <div class="in">
                    Celular:
                    <input type="text" id="cel" name="cel" required> 
                </div>
                <div class="in">
                    o<input type="text" id="cel2" name="cel2">
                </div>
            </div>
            <div class="linea">
                <div class="in">
                    Nombre de la madre:
                    <input type="text" id="madre" name="madre">
                </div>
                <div class="in">
                    Ocupación:
                    <input type="text" id="ocupacion-m" name="ocupacion-m">
                </div>
            </div>
            <div class="linea">
                <div class="in">
                    Nombre de la padre:
                    <input type="text" id="padre" name="padre">
                </div>
                <div class="in">
                    Ocupación:
                    <input type="text" id="opcupacion-p" name="ocupacion-p">
                </div>
            </div>
            <div class="in">
                motivo de consulta
                <input type="text" id="motivo" name="motivo" required>
            </div>
        </div>
        <div class="contenedor-sec">
            <h3>Antecedentes heredofamiliares</h3>
            <div class="pip">
                <div class="pregunta">
                    Diabetes:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-diabetes" name="diabetes">
                    <input type="text" id="text-diabetes" class="txt-in" name="diabetes-in"> 
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Presión alta:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-presion" name="presion">
                    <input type="text" class="txt-in" id="txt-presion" name="presion-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Cáncer:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-cancer" name="cancer">
                    <input type="text" id="text-cancer" class="txt-in" name="cancer-in"> 
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Enfermedades del corazón, hígado o riñón:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-chr" name="corazon">
                    <input type="text" class="txt-in" id="txt-chr" name="corazon-in"> 
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Enfermedades mentales:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-mental" name="mental">
                    <input type="text" class="txt-in" id="txt-mental" name="mental-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Epilepsia y/o convulsiones:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-epile" name="epilep">
                    <input type="text" class="txt-in" id="txt-epile" name="epilep-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Asma:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-asmah" name="asma">
                    <input type="text" class="txt-in" id="txt-asmah" name="asma-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Enfermedades sanguíneas:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-sangui" name="san">
                    <input type="text" class="txt-in" id="txt-sangui" name="san-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Enfermedades endocrinas:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-endo" name="endo">
                    <input type="text" class="txt-in" id="txt-endo" name="endo-in">
                </div>
            </div>
        </div>
        <div class="contenedor-sec">
            <h3>Antecedentes personales patológicos</h3>
            <div class="pip">
                <div class="pregunta">
                    Asma:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-asmap" name="asmap">
                    <input type="text" id="txt-asmap" class="txt-in" name="asmap-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Alergias (alimentos o medicamento):
                </div>
                <div class="de">
                    <input type="checkbox" id="check-alergia" name="alergia">
                    <input type="text" class="txt-in" id="txt-alergia" name="alergia-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Alteraciones neurológicas:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-neuro" name="neuro">
                    <input type="text" class="txt-in" id="txt-neuro" name="neuro-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Cardiopatías:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-cardio" name="cardio">
                    <input type="text" class="txt-in" id="txt-cardio" name="cardio-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Enfermedades de hígado o riñón:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-hr" name="higado">
                    <input type="text" class="txt-in" id="txt-hr" name="higado-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Enfermedades propias de la infancia: (varicela):
                </div>
                <div class="de">
                    <input type="checkbox" id="check-infancia" name="infancia">
                    <input type="text" class="txt-in" id="txt-infancia" name="infancia-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Endocrionopatías:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-endocrino" name="endocrino">
                    <input type="text" class="txt-in" id="txt-endocrino" name="endocrino-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Fiebre reumática:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-fiebre" name="fiebre">
                    <input type="text" class="txt-in" id="txt-fiebre" name="fiebre-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Infecciones frecuentes:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-infe" name="infe">
                    <input type="text" class="txt-in" id="txt-infe" name="infe-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Traumatismos:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-trauma" name="trauma">
                    <input type="text" class="txt-in" id="txt-trauma" name="trauma-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Trastornos de lenguajes:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-trasto" name="tras">
                    <input type="text" class="txt-in" id="txt-trasto" name="tras-in">
                </div>
            </div>
            <div>
                Otras:
                <input type="checkbox" id="check-otra" name="otra">
                <input type="text" class="txt-in" id="txt-otra" name="otra-in">
            </div>
        </div>
        <div class="contenedor-sec">
            <h3>Antecedentes personales no patológicos</h3>
            <div class="in">
                Esquema de vacunación:
                <input type="text" id="vacunacion" name="vacunacion" required>
            </div>
            <div class="in">
                Hábitos (succión digital, morderse las uñas, morder objetos):
                <input type="text" id="habitos" name="habitos">
            </div>
            <div class="linea">
                <div class="in">
                    Cuantas veces se lava los dientes:
                    <input type="text" id="n-lavado" name="n-lavado">
                </div>
                <div class="in">
                    Quien realiza el cepillado:
                    <input type="text" id="quien" name="quien">
                </div>
            </div>
            <div class="linea">
                <div class="in">
                    Escuela:
                    <input type="text" id="escuela" name="escuela">
                </div>
                <div class="in">
                    Grado que cursa:
                    <input type="text" id="grado" name="grado">
                </div>
            </div>
            <div class="in">
                Experiencias desagradebles con médicos/dentistas
                <input type="text" id="experiencias" name="experiencias">
            </div>
            <div class="in">
                ¿Quien recomendó o como se dió cuentas de este consultorio?:
                <input type="text" id="recomendacion" name="recomendacion">
            </div>
        </div>
        <div class="contenedor-sec">
            <h3>Diagnóstico odontopediatrico</h3>
            <div id="contenedor-canva">
                <canvas id="canva"></canvas>
            </div> 
            <button type="button" id="undoButton" class="btn-e">Atrás</button><br><br>
            <div class="in">
                Notas: 
                <input type="text" name="dia-desc">
            </div>
        </div>
        <div class="contenedor-sec">
            <h3>Explaración intraoral</h3>
            <div class="pip">
                <div class="pregunta">
                    Línea media:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-linea" name="linea">
                    <input type="text" id="txt-linea" class="txt-in" name="linea-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Planos terminales:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-planos" name="planos">
                    <input type="text" class="txt-in" id="txt-planos" name="planos-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Angle:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-angle" name="angle">
                    <input type="text" class="txt-in" id="txt-angle" name="angle-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Relación canina:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-canina" name="canina">
                    <input type="text" class="txt-in" id="txt-canina" name="canina-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Sobremordida vertical:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-svertical" name="ver">
                    <input type="text" class="txt-in" id="txt-svertical" name="ver-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Sobremordida horizontal:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-shorizontal" name="hor">
                    <input type="text" class="txt-in" id="txt-shorizontal" name="hor-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Espacios primates:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-eprima" name="prima">
                    <input type="text" class="txt-in" id="txt-eprima" name="prima-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Espacios fisiológicos:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-efisio" name="fisio">
                    <input type="text" class="txt-in" id="txt-efisio" name="fisio-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Mordida cruzada:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-mcruzada" name="cruz">
                    <input type="text" class="txt-in" id="txt-mcruzada" name="cruz-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Mordida abierta:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-mabierta" name="abierta">
                    <input type="text" class="txt-in" id="txt-mabierta" name="abierta-in">
                </div>
            </div><div class="pip">
                <div class="pregunta">
                    Mal posición dentaria:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-malp" name="mal">
                    <input type="text" id="txt-malp" class="txt-in" name="mal-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Diastema:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-diastema" name="diastema">
                    <input type="text" class="txt-in" id="txt-diastema" name="diastema-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Secuencia anormal:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-secuencia" name="secuencia">
                    <input type="text" class="txt-in" id="txt-secuencia" name="secuencia-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Perdida prematura:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-perdida" name="perdida">
                    <input type="text" class="txt-in" id="txt-perdida" name="perdida-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Retención prolongada:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-reten" name="reten">
                    <input type="text" class="txt-in" id="txt-reten" name="reten-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Erupción retardada:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-erupcion" name="erupcion">
                    <input type="text" class="txt-in" id="txt-erupcion" name="erupcion-in">
                </div>
            </div>
            <div class="pip">
                <div class="pregunta">
                    Falta de contacto proximal:
                </div>
                <div class="de">
                    <input type="checkbox" id="check-proxi" name="proxi">
                    <input type="text" class="txt-in" id="txt-proxi" name="proxi-in">
                </div>
            </div>
        </div>
        <div class="contenedor-sec">
            <h3>Consentimiento informado y Aceptación del tratamiento</h3>
            <div class="date">
                <label for="">Fecha:</label>
                <input type="date" name="fechaf">
            </div>
            <div class="tex">
                <p>
                    Con esta fecha el Cirujano Dentista con Maestría en Estomatología Pediátrica le realizó una 
                    historia clínica a mi hijo(a) <input type="text" name="nombref"> en la cual respondí de forma verídica y se
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
            </div>
            <div class="firmass">
                <div id="ccanva-firma">
                    <canvas id="canva-firma"></canvas>
                    <input type="text" name="nombret" placeholder="nombre del padre o tutor" style="width: 100%;">
                    <h4>Nombre y firma del padre o tutor</h4>
                </div>
                <div id="cfoto-f">
                    <img src="../iconos/firma.jpg" id="foto-firma">
                    <h4>M.E.P NELIDA DANIELA CUELLAR</h4>
                </div>
            </div>
        </div>
        <div id="btn">
            <button id="crear-expe" class="btn-e">Crear</button>
        </div>
    </form>
    </div>
</div>
</body>
<script src="../js/form-expediente.js?v=<?php echo time(); ?>" defer></script>
<script>
    const cfirma = document.getElementById('canva-firma');
    const dibuja = cfirma.getContext('2d');

    let raya = false
    function resizeCanvas() {
        const container = document.getElementById('ccanva-firma');
        cfirma.width = container.clientWidth;
        cfirma.height = (container.clientWidth / 835) * 484;
    }

    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    cfirma.addEventListener('mousedown', startDrawing);
    cfirma.addEventListener('mousemove', draw);
    cfirma.addEventListener('mouseup', stopDrawing);
    cfirma.addEventListener('mouseout', stopDrawing);
    cfirma.addEventListener('touchstart', startDrawingTouch);
    cfirma.addEventListener('touchmove', drawTouch);
    cfirma.addEventListener('touchend', stopDrawing);

    function getTouchPos(cfirma, touchEvent) {
        const rect = cfirma.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }

    function startDrawingTouch(event) {
        event.preventDefault();
        raya = true;
        const touchPos = getTouchPos(cfirma, event);
        dibuja.beginPath();
        dibuja.moveTo(touchPos.x, touchPos.y);
    }

    function drawTouch(event) {
        event.preventDefault();
        if (!raya) return;
        const touchPos = getTouchPos(cfirma, event);
        dibuja.lineTo(touchPos.x, touchPos.y);
        dibuja.stroke();
    }

    function startDrawing(event) {
        raya = true;
        dibuja.beginPath();
        dibuja.moveTo(event.offsetX, event.offsetY);
    }

    function draw(event) {
        if (!raya) return;
        dibuja.lineTo(event.offsetX, event.offsetY);
        dibuja.stroke();
    }

    function stopDrawing() {
        raya = false;
        dibuja.closePath();
    }

    function clearCanvas() {
        context.clearRect(0, 0, cfirma.width, cfirma.height);
        resizeCanvas();
    }
</script>
</html>