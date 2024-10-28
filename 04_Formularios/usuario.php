<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>