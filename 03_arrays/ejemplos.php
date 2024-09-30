<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
</head>
<body>
<?php
/* Todos los arrays en php son asociativos como los map de java

    tienen pares clave - valor y son dinamicos 
*/

$numeros =[5, 6, 7, 8, 4];
$numeros = array(6,10,5,4);
print_r($numeros); #PRINT RELATIONAL

echo "<br></br>";
//$animales = ["Perro", "Gato", "Ornitorrinco"];
$animales = [
    "A01" => "Perro",
    "A02" => "Gato",
    "A03" => "Ornitorrinco",
    "A04" => "Suricato",
    "A05" => "Capibara",
];
//print_r($animales);
echo "<p>" . $animales["A03"] . "</p>";
 ?>
</body>
</html>