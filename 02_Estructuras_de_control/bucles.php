<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php
        echo "<h1>Lista con WHILE</h1>";
        $i = 1;
        echo"<ul>";
        while($i <= 10){
            echo "<li>$i</li>";
            $i++;
        }
        echo"</ul>";

        echo "<h1>Lista con WHILE alternativa</h1>";
        $i = 1;
        echo"<ul>";
        while($i <= 10):
            echo "<li>$i</li>";
            $i++;
        endwhile;
        echo"</ul>";
    ?>
    <!--EJERCICIO 1: MOSTRAR EN UNA LISTA LOS NUMEROS MULTIPLOS DE 3 USANDO WHILE E IF-->
    <?php
    $num = 0; 
    while ($num < 50){
        if($num % 3 == 0){
            echo "$num es multiplo de 3";
        }
        $num++;
    }
    ?>
    <!--EJERCICIO 2: CALCULAR LA SUMA DE LOS NUMEROS PARES ENTRE 1 Y 20-->
    <?php
    $num = 0; 
    $suma = 0;
    while ($num < 20){
        if($num % 2 == 0){
            $suma += $num;
        }
        $num++;
    }
    echo "La suma de los 20 primeros numeros pares es $suma";
    ?>
    <!--EJERCICIO 3: CALCULAR EL FACTORIAL DE 6 CON WHILE-->
    <?php
    $num= 5; 
    $i = 1;
    $factorial = 1;
    if($num < 0){
        $factorial = " ";
        echo "ERROR. No se puede calcular el factorial de un numero negativo";
    }
    else{
        while ($i <= $num && $num >= 0){
            $factorial = $factorial * $i;
            $i++;
            if($num == 0){
                $factorial = 1;
            }
        }
        echo "El factorial de $num es $factorial";
    }
    ?>
</body>
</html>