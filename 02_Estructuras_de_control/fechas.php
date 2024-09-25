<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    $numero = "2";
    $numero = (int) $numero;
    if($numero === 2){
        echo "EXITO";
    }
    else{
        echo "NO EXITO";
    }

    /*
    COMPRUEBA SI EL VALOR Y EL TIPO ES IDENTICO LOS ===
        "2" == 2   "2" es igual a 2 TRUE
        "2" !== 2  "2" no es identico a 2 TRUE
        2 === 2     2 si es identico a 2 TRUE 
        2 !== 2.0   2 no es identico a 2.0 TRUE
    */

    $hora =(int)date("G");
    //var_dump($hora);

    /* 
        SI $hora ENTRE 6 Y 11, ES MAÑANA
        SI $hora ENTRE 12 Y 14, MEDIODIA
        SI $hora ENTRE 15 Y 20, ES TARDE
        SI $hora ENTRE 20 Y 0, ES NOCHE
        SI $hora ENTRE 1 Y 5, ES MADRUGADA
    */
    $hora_exacta = date("H:i:s");
    echo "<h1>$hora_exacta</h1>";

    $dia = date("l");
    echo "<h2>Hoy es $dia</h2>";

    /*
        TENEMOS CLASE LUNES, MIERCOLES Y VIERNES 
        NO TENEMOS EL RESTO

        HACER UN SWITCH QUE SI HOY TENEMOS CLASE
     */
    switch($dia){
        case "Monday":
        case "Wednesday":
        case "Friday":
            echo "<p>SI TENEMOS CLASE</p>";
            break;
        default:
            echo "<p>NO TENEMOS CLASE</p>";
    }
    ?>
</body>
</html>