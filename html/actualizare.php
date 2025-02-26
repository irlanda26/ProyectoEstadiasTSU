<?php
    require '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/actualizare.css?v=<?php echo time(); ?>">
    <title>Actualizar</title>
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
    <div id="cuerpo">
        <div id="contenedor-t">
            <form id="editar-e" method="post" enctype="multipart/form-data" action="../php/actualizare.php">
                <table class="tablota" border="1">
                    <?php
                    $expe = $_GET['expediente'];
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente WHERE ID_expediente=:vexpe");
                    $pdo -> bindParam(":vexpe", $expe, PDO::PARAM_INT);
                    $pdo -> execute();
                    $resultado = $pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '
                    <thead>
                        <th colspan="2" class="titulo">Datos generales</th>
                    </thead>
                    <tr>
                        <th>Paciente:</th>
                        <td>
                            <input type="text" value="'.$value['nombre_paciente'].'" name="nombre">
                            <input type="hidden" value="'.$value['ID_expediente'].'" name="ide">
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de registro:</th>
                        <td><input type="date" value="'.$value['fecha'].'" name="fecha"></td>
                    </tr>
                    <tr>
                        <th>Edad:</th>
                        <td><input type="text" value="'.$value['edad'].'" name="edad"></td>
                    </tr>
                    <tr>
                        <th>Fecha de nacimiento:</th>
                        <td><input type="date" value="'.$value['f_nacimiento'].'" name="f_naci"></td>
                    </tr>
                    <tr>
                        <th>Lugar de nacimiento:</th>
                        <td><input type="text" value="'.$value['lu_nacimiento'].'" name="lugar_n"></td>
                    </tr>
                    <tr>
                        <th>Lugar de residencia:</th>
                        <td><input type="text" value="'.$value['lu_residencia'].'" name="lugar_r"></td>
                    </tr>
                    <tr>
                        <th>No. hermano que ocupa:</th>
                        <td><input type="text" value="'.$value['no_hermano'].'" name="n_her"></td>
                    </tr>
                    <thead>
                        <th colspan="2" class="titulo">Datos de contacto</th>
                    </thead>
                    <tr>
                        <th>Calle:</th>
                        <td><input type="text" value="'.$value['calle'].'" name="calle"></td>
                    </tr>
                    <tr>
                        <th>No. Calle:</th>
                        <td><input type="text" value="'.$value['no_calle'].'" name="nc"></td>
                    </tr>
                    <tr>
                        <th>Colonia:</th>
                        <td><input type="text" value="'.$value['colonia'].'" name="colonia"></td>
                    </tr>
                    <tr>
                        <th>Contacto 1:</th>
                        <td><input type="text" value="'.$value['celular'].'" name="cel"></td>
                    </tr>
                    <tr>
                        <th>Contacto 2:</th>
                        <td><input type="text" value="'.$value['celular_2'].'" name="cel2"></td>
                    </tr>
                    <tr>
                        <th>Madre:</th>
                        <td><input type="text" value="'.$value['nombre_m'].'" name="madre"></td>
                    </tr>
                    <tr>
                        <th>Ocupación de la madre:</th>
                        <td><input type="text" value="'.$value['ocupacion_m'].'" name="ocupacion_m"></td>
                    </tr>
                    <tr>
                        <th>Padre:</th>
                        <td><input type="text" value="'.$value['nombre_p'].'" name="padre"></td>
                    </tr>
                    <tr>
                        <th>Ocupación del padre:</th>
                        <td><input type="text" value="'.$value['ocupacion_p'].'" name="ocupacion_p"></td>
                    </tr>
                    <thead>
                        <th colspan="2" class="titulo">Antecedentes heredofamiliares</th>
                    </thead>';}
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM antecedentes_heredofa WHERE ID_expediente=:vexpeh");
                    $pdo -> bindParam(":vexpeh", $expe, PDO::PARAM_INT);
                    $pdo -> execute();
                    $resultado = $pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '
                    <tr>
                        <th>'.$value['antecedente'].':</th>
                        <td>
                            <input type="text" value="'.$value['quienes'].'" name="quienp['.$value['ID_antecedente'].']">
                            <input type="hidden" value="'.$value['ID_antecedente'].'" name="idah[]">
                        </td>
                    </tr>';}?>
                    <thead>
                        <th colspan="2" class="titulo">Antecedentes patológicos</th>
                    </thead>
                        <?php
                        $expe = $_GET['expediente'];
                        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM an_personales_p WHERE ID_expediente=:vexpepp");
                        $pdo -> bindParam(":vexpepp", $expe, PDO::PARAM_INT);
                        $pdo -> execute();
                        $resultado = $pdo -> fetchAll();
                        foreach($resultado as $key => $value) {
                            echo '<tr>
                        <th>'.$value['antecedentes'].':</th>
                        <td>
                            <input type="text" value="'.$value['descripcion_a'].'" name="descria['.$value['ID_antecedentes_pp'].']">
                            <input type="hidden" value="'.$value['ID_antecedentes_pp'].'" name="idpp[]">
                        </td>
                    </tr>';}?>
                    <thead>
                        <th colspan="2" class="titulo">Antecedentes personales</th>
                    </thead
                    <?php
                    $expe = $_GET['expediente'];
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM expediente WHERE ID_expediente=:vexpe");
                    $pdo -> bindParam(":vexpe", $expe, PDO::PARAM_INT);
                    $pdo -> execute();
                    $resultado = $pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '
                    <tr>
                        <th>Esquema de vacunacion:</th>
                        <td><input type="text" value="'.$value['vacunacion'].'" name="vacunacion"></td>
                    </tr>
                    <tr>
                        <th>Habitos:</th>
                        <td><input type="text" value="'.$value['habitos'].'" name="habitos"></td>
                    </tr>
                    <tr>
                        <th>No. lavado de dientes:</th>
                        <td><input type="text" value="'.$value['n_lavado'].'" name="n_l"></td>
                    </tr>
                    <tr>
                        <th>Quien realiza el cepillado:</th>
                        <td><input type="text" value="'.$value['quien'].'" name="quien"></td>
                    </tr>
                    <tr>
                        <th>Escuela:</th>
                        <td><input type="text" value="'.$value['escuela'].'" name="escuela"></td>
                    </tr>
                    <tr>
                        <th>Grado que cursa:</th>
                        <td><input type="text" value="'.$value['grado'].'" name="grado"></td>
                    </tr>
                    <tr>
                        <th>Experiencias desagradables:</th>
                        <td><input type="text" value="'.$value['experiencias'].'" name="experi"></td>
                    </tr>
                    <tr>
                        <th>Quien recomendo el consultorio:</th>
                        <td><input type="text" value="'.$value['recomendacion'].'" name="recomendacion"></td>
                    </tr>';}
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM diagnostico WHERE ID_expediente=:vexped");
                    $pdo -> bindParam(":vexped", $expe, PDO::PARAM_INT);
                    $pdo -> execute();
                    $resultado = $pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '
                    <thead>
                        <th colspan="2" class="titulo">Diagnóstico</th>
                    </thead>
                    <th colspan="2">
                            <div id="contenedor-canva">
                                <canvas id="canva"></canvas>
                            </div>
                            <button type="button" id="undoButton" class="btn-e">Atrás</button>
                    </th>
                    <tr>
                        <th>Notas:</th>
                        <td>
                            <input type="text" value="'.$value['notas'].'" name="notasd">
                            <input type="hidden" value="'.$value['ID_diagnostico'].'" name="idn">
                        </td>
                    </tr>';
                    $rutaImg = '../php/'.$value['img'];}?>
                    <thead>
                        <th colspan="2" class="titulo">Exploración intraoral</th>
                    </thead>
                    <?php
                    $expe = $_GET['expediente'];
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM exploracion WHERE ID_expediente=:vexpeex");
                    $pdo -> bindParam(":vexpeex", $expe, PDO::PARAM_INT);
                    $pdo -> execute();
                    $resultado = $pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '
                    <tr>
                        <th>'.$value['nombre'].':</th>
                        <td>
                            <input type="text" value="'.$value['descripcion'].'" name="exdesc['.$value['ID_exploracion'].']">
                            <input type="hidden" value="'.$value['ID_exploracion'].'" name="idex[]">
                        </td>
                    </tr>
                    ';}?>
                    <thead>
                        <th colspan="2" class="titulo">Notas clinicas</th>
                    </thead>
                    <?php
                    $expe = $_GET['expediente'];
                    $pdo = ConexionBD::cBD()->prepare("SELECT * FROM notas WHERE ID_expediente=:vexpen");
                    $pdo -> bindParam(":vexpen", $expe, PDO::PARAM_INT);
                    $pdo -> execute();
                    $resultado = $pdo -> fetchAll();
                    foreach($resultado as $key => $value) {
                        echo '<tr>
                        <th>Fecha: <input type="date" name="fechan['.$value['idnotas'].']" value="'.$value['fecha'].'"></th>
                        <td>
                            <input type="text" value="'.$value['notac'].'" name="notac['.$value['idnotas'].']">
                            <input type="hidden" value="'.$value['idnotas'].'" name="idnc[]">
                        </td>
                    </tr>';
                    }?>
                </table>
                <div>
                    <button id="act">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('canva');
    const context = canvas.getContext('2d');
    const img = new Image();
    const rutaImagen = '<?php echo $rutaImg; ?>';
    img.src = rutaImagen;
    let lines = [];
    let dibujar = false;
    let currentLine = [];
    
    img.onload = function() {
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);
    };

    function resizeCanvas() {
        const container = document.getElementById('contenedor-canva');
        canvas.width = container.clientWidth;
        canvas.height = (container.clientWidth / 835) * 484;
        context.drawImage(img, 0, 0, canvas.width, canvas.height);
        redrawCanvas(); // Redibujar todo después de redimensionar

        canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseout', stopDrawing);

    // Eventos de touch
    canvas.addEventListener('touchstart', startDrawingTouch);
    canvas.addEventListener('touchmove', drawTouch);
    canvas.addEventListener('touchend', stopDrawing);

    function getTouchPos(canvas, touchEvent) {
        const rect = canvas.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }

    function startDrawing(event) {
        dibujar = true;
        currentLine = [{ x: event.offsetX, y: event.offsetY }];
        context.beginPath();
        context.moveTo(event.offsetX, event.offsetY);
    }

    function draw(event) {
        if (!dibujar) return;
        currentLine.push({ x: event.offsetX, y: event.offsetY });
        context.lineTo(event.offsetX, event.offsetY);
        context.stroke();
    }

    function startDrawingTouch(event) {
        event.preventDefault();
        dibujar = true;
        const touchPos = getTouchPos(canvas, event);
        currentLine = [{ x: touchPos.x, y: touchPos.y }];
        context.beginPath();
        context.moveTo(touchPos.x, touchPos.y);
    }

    function drawTouch(event) {
        event.preventDefault();
        if (!dibujar) return;
        const touchPos = getTouchPos(canvas, event);
        currentLine.push({ x: touchPos.x, y: touchPos.y });
        context.lineTo(touchPos.x, touchPos.y);
        context.stroke();
    }

    function stopDrawing() {
        if (!dibujar) return;
        dibujar = false;
        context.closePath();
        if (currentLine.length > 0) {
            lines.push({ points: currentLine, color: context.strokeStyle, lineWidth: context.lineWidth });
        }
    }

    function redrawCanvas() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.drawImage(img, 0, 0, canvas.width, canvas.height);
        lines.forEach(line => {
            context.strokeStyle = line.color;
            context.lineWidth = line.lineWidth;
            context.beginPath();
            const points = line.points;
            context.moveTo(points[0].x, points[0].y);
            for (let i = 1; i < points.length; i++) {
                context.lineTo(points[i].x, points[i].y);
            }
            context.stroke();
        });
    }

    document.getElementById('undoButton').addEventListener('click', () => {
        if (lines.length > 0) {
            lines.pop(); // Elimina la última línea del array
            redrawCanvas(); 
        }
    });
    }
    
    const enviar = document.getElementById('act')
    enviar.onclick = async (event) => {
        event.preventDefault();

        const data = canvas.toDataURL("image/png");
        const a = document.getElementById('editar-e')

        const fda = new FormData(a)
        fda.append("imagen", data);

        fetch('../php/actualizare.php', {
        method: 'POST',
        body: fda
        })
        .then(response => response.text())  // Cambia a text() temporalmente para ver la respuesta completa
        .then(data => {
            console.log('Respuesta completa del servidor:', data);
            try {
                const jsonData = JSON.parse(data);  // Intenta convertir a JSON
                if (jsonData.success) {
                    alert('Datos actualizados correctamente');
                    window.location.href = `expediente.php?expediente=${id}`;
                } else {
                    alert('Hubo un problema actualizando los datos');
                }
            } catch (error) {
                console.error('Error al parsear JSON:', error);
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        });
} 
})
</script>
</html>