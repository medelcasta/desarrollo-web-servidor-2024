<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
        require('../05_funciones/depurar.php');
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<!--
    VIDEOJUEGOS
        TITULO => 1-80 caracteres, cualquier caracter (SI)
        consola = Nintendo Switch, PS5, PS4, Xbox Series X/S (radio button)
        fecha lanzamiento => el videojuego mas antiguo adminible sera del 1 de enero de 1947,
         y el más en el futuro no podrá de más de 5 años (dinamico)
        -pegi = 3, 7, 12, 16, 18 (select)
        Descripcion = 0-255 caracteres, cualquier caracter (campo opcional ) - text area


        -LIMPIAR LOS DATOS DEL FORMULARIO Y VALIDARLOS 
        -MOSTRAR TODO POR PANTALLA SI HA PASADO LA VALIDACION
-->

<!--

FORMULARIO + ESTRUCUTRA DE CODIGO
A PAPEL SOLO HARIAMOS LA VALIDACION 
PATRON PARA VALIDAR ALGO 
-->

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_titulo = depurar($_POST["titulo"]);
           //$tmp_consola = depurar($_POST["consola"]);
            $tmp_fecha_lanzamiento= depurar($_POST["fecha_lanzamiento"]);
            $tmp_pegi = depurar($_POST["pegi"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            if($tmp_titulo == ''){
                $err_titulo = "El titulo es un campo OBLIGATORIO";
            }else{
                if(strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 80) {
                    $err_nombre = "El nombre debe tener entre 1 y 80 caracteres";
                } else {
                    $titulo = $tmp_titulo;
                } 
            }

            if (isset($_POST['consola'])) { 
                $tmp_consola =depurar($_POST['consola']); 
                $consola = $tmp_consola; 
            } else { 
                $err_consola = "No has seleccionado ninguna consola."; 
            }

            if($tmp_fecha_lanzamiento == '') {
                $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha_lanzamiento)) {
                    $err_fecha_lanzamiento = "Formato de fecha incorrecto";
                } else {
                    $fecha_actual = new DateTime(); 
                    $fecha_actual->modify('+5 years'); 
                    $fecha_max = $fecha_actual->format('Y-m-d');
                    echo $fecha_futura;
                    list($anno_max,$mes_max,$dia_max) = explode('-',$fecha_max);
                    list($anno,$mes,$dia) = explode('-',$tmp_fecha_lanzamiento);

                    if($anno_max - $anno < 77) {
                        $err_fecha_lanzamiento = "No puede ser Anterior a 1947";
                    } elseif($anno_max - $anno == 77) {
                        if($mes_max - $mes < 0) {
                            $err_fecha_lanzamiento = "No puede ser Anterior a 1947";
                        } elseif($mes_max - $mes == 0) {
                            if($dia_max - $dia < 0) {
                                $err_fecha_lanzamiento = "No puede ser Anterior a 1947";
                            } else {
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            }
                        } elseif($mes_max- $mes > 0) {
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } 
                    } elseif($anno_max - $anno > 5) {
                        $err_fecha_nacimiento = "No puede para mas de 5 años";
                    } elseif($anno_max - $anno == 5) {
                        if($mes_max - $mes > 0) {
                            $err_fecha_lanzamiento = "No puede para mas de 5 años";
                        } elseif($mes_max - $mes == 0) {
                            if($dia_max - $dia >= 0) {
                                $err_fecha_lanzamiento = "No puede para mas de 5 años";
                            } else {
                                $err_fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            }
                        } elseif($mes_max - $mes < 0) {
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } 
                    }else{
                        $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                    }
                } 
            }

            $pegi_trans = (int)$tmp_pegi;
            if(!is_numeric($pegi_trans)){
                $err_pegi = "Pegi es un valor numerico";
            }else{
                if($tmp_pegi == 3 ||$tmp_pegi == 5 || $tmp_pegi == 7 || $tmp_pegi == 12 || $tmp_pegi == 16 || $tmp_pegi == 18 ){
                    $pegi = $tmp_pegi;
                }else{
                    $err_pegi = "Pegi incorrecto";
                }
                
            }
        }
    ?>
    <form action="" method="post">
        <h1>Formulario Videojuego</h1>
        <div>
            <label>Titulo del Videojuego</label>
            <input type="text" name="titulo">
            <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
        </div>
        <div>
            <label>Tipo de Consola</label>
                <br>
                <label> 
                    <input type="radio" name="consola" value="Nintendo Switch">
                    Nintendo Switch 
                </label>
                <br> 
                <label> 
                    <input type="radio" name="consola" value="PS5">
                    PS5 
                </label>
                <br> 
                <label> 
                    <input type="radio" name="consola" value="PS4">
                    PS4 
                </label>
                <br> 
                <label> 
                    <input type="radio" name="consola" value="Xbox Series X/S">
                    Xbox Series X/S
                </label>
            <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>" ?>
        </div>
        <div>
            <label>Fecha de lanzamiento</label>
            <input type="date" name="fecha_lanzamiento">
            <?php if(isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>" ?>
        </div>
        <div>
            <label>PEGI</label>
            <select name="pegi"> 
                <option value="tres">3</option> 
                <option value="siete">7</option> 
                <option value="doce">12</option> 
                <option value="dieciseis">16</option> 
                <option value="dieciocho">18</option> 
            </select>
            <?php if(isset($err_pegi)) echo "<span class='error'>$err_pegi</span>" ?>
        </div>
        <div>
            <label>Descripción</label>
            <input type="textarea" name="descripcion">
            <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
        </div>
        <div>
            <input type="submit" value="Añadir">
        </div>
    </form>
    <?php
        if(isset($titulo) && isset($consola) && isset($fecha_lanzamiento)) { ?>
            <h4>Datos Recogidos</h4>
            <p><?php echo $titulo ?></p>
            <p><?php echo $consola ?></p>
            <p><?php echo $fecha_lanzamiento ?></p>
            <p><?php echo $pegi ?></p>
        <?php } ?>
</body>
</html>