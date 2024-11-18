<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <?php
     error_reporting( E_ALL );
     ini_set("display_errors", 1 );  
     require 'conexion.php'; ?>
</head>
<body>
    <?php 
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $nombre_estudio = $_POST["nombre_estudio"];
        $fabricante= $_POST["fabricante"];
        $generacion = $_POST["generacion"];
        $unidades_vendidas = $_POST["unidades_vendidas"];

        $sql = "INSERT INTO consolas (nombre_estudio, fabricante, generacion, unidades_vendidas)
                VALUES ('$nombre_estudio', '$fabricante', $generacion, '$unidades_vendidas')";

            $_conexion -> query($sql);
    }
    ?>
    <form action="" method="post">
        <h1>Formulario Nuevo Estudio</h1>
        <label>Nombre Estudio</label>
        <input type="text" name="nombre_estudio">
        <label>Fabricante</label>
        <input type="text" name="fabricante">
        <label>Generacion</label>
        <input type="text" name="generacion">
        <label>Unidades Vendidas</label>
        <input type="text" name="unidades_ventidas">

        <input type="submit" value="Enviar">
    </form>

    
</body>
</html>