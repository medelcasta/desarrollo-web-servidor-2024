<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
    VIDEOJUEGOS
        TITULO => 1-80 caracteres, cualquier caracter
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

    <?php ?>
    <label>Titulo del Videojuego</label>
    <input type="text" name="titulo">

    <label>Fecha de lanzamiento</label>
    <input type="date" name="fecha_lanzamiento">

    <label>PEGI</label>
    <input type="text" name="pegi">

</body>
</html>