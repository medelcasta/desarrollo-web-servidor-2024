<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
    <style>
        .error{
            color:red;

        }
    </style>
</head>
<body>
    
    <div class="container">
        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $tmp_usuario = $_POST["usuario"];
                $tmp_nombre = $_POST["nombre"];
                $tmp_apellidos = $_POST["apellidos"];
                $tmp_dni = $_POST["dni"];
                $tmp_correo =$_POST["correo"];
                $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];

                echo "<h1>$tmp_fecha_nacimiento</h1>";
                if($tmp_fecha_nacimiento == ''){
                    $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
                }else{
                    /*
                    $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    if(!preg_match($patron, $tmp_fecha_nacimiento)){ //comprueba si el patron existe dentro de la variable si lo niego tendre el error
                        $err_usuario = "Formato de fecha incorrecta";
                    }else{
                        $fecha_actual = date("Y-m-d");
                        list($anio_ac, $mes_ac, $dia_ac) = explode('-', $fecha_actual);
                        list($anio, $mes, $dia) = explode('-', $tmp_fecha_nacimiento);
                        if($anio_ac - $anio < 18){
                            $err_fecha_nacimiento = "No puedes ser menor de edad";
                        }elseif($anio_ac - $anio == 0){
                            if($mes_ac - $mes < 0){
                                //es menor de edad
                            }elseif($mes_ac - $mes > 0){
                                //es mayor de edad
                            }else{
                                
                            }
                        }
                    }*/
                    
                    $fecha_actual = date("Y-m-d");
                    $array_actual = explode('-', $fecha_actual);
                    list($anio_ac, $mes_ac, $dia_ac) = $array_actual;
                    $array_fecha_nacimiento = explode('-', $tmp_fecha_nacimiento);
                    list($anio, $mes, $dia) = $array_fecha_nacimiento;
                    if($anio_ac - $anio < 18){
                        $err_fecha_nacimiento = "Es menor 1 año mal";
                    }else if($anio_ac - $anio > 18){
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    }else if($anio_ac - $anio == 18){
                        if($mes_ac - $mes < 0){
                            $err_fecha_nacimiento = "Es menor 2 mes mal";
                        }else if($mes_ac - $mes > 0){
                            $fecha_nacimiento = $tmp_fecha_nacimiento;
                        }else if($anio_ac - $anio == 0){
                            if($dia_ac - $dia < 0){
                                $err_fecha_nacimiento = "Es menor 3 dia mal";
                            }else if($dia_ac - $dia >= 0){
                                $fecha_nacimiento = $tmp_fecha_nacimiento;
                            }
                        }
                    } 
                    if($anio_ac - $anio > 121){
                        $err_fecha_nacimiento = "NO puede tener mas de 121 años";
                    }else if ($anio_ac - $anio < 121){
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    }
                    
                }

                if($tmp_dni == ''){
                    $err_dni = "El DNi es obligatorio";
                }else{
                    $tmp_dni = strtoupper($tmp_dni);
                    $patron = "/^[0-9]{8}[A-Z]$/";
                    if(!preg_match($patron, $tmp_dni)){
                        $err_dni = "El DNI debe tener 8 digitos y una letra";
                    }else{
                        $numero_dni = (int)substr($tmp_dni, 0, 8); //coge de la posicion 0 a la 7 ej 09075792S COGE 09075792 SIN LA LETRA ($variable, posicion, tam)
                        $letra_dni = substr($tmp_dni, 8, 1);

                        $resto_dni = $numero_dni % 23;
                        /*
                        $letra_correcta = match ($resto_dni) {
                            0 => "T", 1 => "R", 2 => "W", 3 => "A", 4 => "G", 5 => "M", 6 => "Y", 
                            7 => "F", 8 => "P", 9 => "D", 10 => "X", 11 => "B", 12 => "N", 13 => "J", 
                            14 => "Z", 15 => "S", 16 => "Q", 17 => "V", 18 => "H", 19 => "L", 
                            20 => "C", 21 => "K", 22 => "E"
                        };*/

                        $letras_dni = "TRWAGMYFPDXBNJZSQVHLCKE";
                        $letra_correcta = substr($letras_dni, $resto_dni, 1);

                        if($letra_dni != $letra_correcta){
                            $err_dni = "La letra del DNI no es correcta";
                        }else{
                            $dni = $tmp_dni;
                        }
                    }
                }
                if($tmp_correo ==''){
                    $err_correo = "El correo electrónico es obligatorio";
                }else{
                    //formato de correo electronico
                    $patron = "/^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9.-]+.)+[a-zA-Z]{2,}$/";
                    if(!preg_match($patron, $tmp_correo)){ //comprueba si el patron existe dentro de la variable si lo niego tendre el error
                        $err_usuario = "El correo no es válido";
                    }else{
                        $palabras_baneadas = ["caca", "peo", "recorcholis", "caracoles", "repampanos"];

                        $palabras_encontradas = "";
                        foreach($palabras_baneadas as $palabra_baneada){
                            if(str_contains($tmp_correo, $palabra_baneada)){
                                $palabras_encontradas = "$palabra_baneada, " . $palabras_encontradas;
                            }
                            if($palabras_encontradas != ''){
                                $err_correo = "No se permiten las palabras:  $palabras_encontradas";
                            }else{
                                $correo = $tmp_correo;
                            }
                        }
                    }
                }

                if($tmp_usuario ==''){
                    $err_usuario = "El usuario es obligatorio";
                }else{
                    //a-z A-Z _
                    //Letras de la A a la Z(mayus o minus) y barrabaja
                    $patron = "/^[a-zA-Z0-9_]{4,12}$/";
                    if(!preg_match($patron, $tmp_usuario)){ //comprueba si el patron existe dentro de la variable si lo niego tendre el error
                        $err_usuario = "El usuario debe contener de 4 a 12 letras, numeros o barrabaja";
                    }else{
                        $usuario = $tmp_usuario;
                    }
                }
                if($tmp_nombre == ''){
                    $err_nombre = "El nombre es obligatorio";
                }else{
                    if(strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 40){
                        $err_nombre = "El nombre debe tener entre 2 y 40 caracteres";
                    }else{
                        //letras, espacios en blancos y tildes
                        $patron = "/^[a-zA-z áéíóúÁÉÍÓÚñNüÜ]+$/";
                        if(!preg_match($patron, $tmp_nombre)){
                            $err_nombre = "El nombre solo puede contenter letras y espacio
                            en blanco";
                        }
                        else{
                            $nombre = $tmp_nombre;
                        }
                    }
                }
                if($tmp_apellidos == ''){
                    $err_apellidos = "El apellido es obligatorio";
                }else{
                    if(strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) > 60){
                        $err_apellidos = "El nombre debe tener entre 2 y 40 caracteres";
                    }else{
                        //letras, espacios en blancos y tildes
                        $patron = "/^[a-zA-z áéíóúÁÉÍÓÚñNüÜ]+$/";
                        if(!preg_match($patron, $tmp_apellidos)){
                            $err_apellidos = "El nombre solo puede contenter letras y espacio
                            en blanco";
                        }
                        else{
                            $nombre = $tmp_apellidos;
                        }
                    }
                }
            }
        ?>
   
        <h1>Formulario Usuario</h1>

        <form action="" method="post" class="col-4">
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input class="form-control" type="text" name="dni">
                <?php 
                    if(isset($err_dni)) echo "<span class='error'>$err_dni</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input class="form-control" type="text" name="correo">
                <?php 
                    if(isset($err_correo)) echo "<span class='error'>$err_correo</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
                <?php 
                    if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre">
                <?php 
                    if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="date" name="fecha_nacimiento">
                <?php 
                    if(isset($err_fecha_nacimiento)) echo "<span class='error'>$err_fecha_nacimiento</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input class="form-control" type="text" name="apellidos">
                <?php 
                    if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>";
                ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>   
        </form>
        <?php 
        if(isset($dni) && isset($correo) && isset($usuario) && isset($nombre)){
        ?> 
            <h1><?php echo $dni ?></h1>
            <h1><?php echo $correo ?></h1>
            <h1><?php echo $usuario ?></h1>
            <h1><?php echo $nombre ?></h1>
        <?php }?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>