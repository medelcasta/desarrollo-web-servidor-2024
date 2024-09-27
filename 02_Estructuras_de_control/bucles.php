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
    <!--EJERCICIO 2: CALCULAR LA SUMA DE LOS NUMEROS PARES ENTRE 1 Y 20-->
    <!--EJERCICIO 3: CALCULAR EL FACTORIAL DE 6 CON WHILE-->
</body>
</html>