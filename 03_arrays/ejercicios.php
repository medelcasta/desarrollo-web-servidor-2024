<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIOS</title>
    <link rel="stylesheet"  type= "text/css" href="estilos.css">
</head>
<body>
<!--
        EJERCICIO 1

        Servidor => Alejandra
        Cliente => Jose Miguel
        Interfaces => Jose Miguel
        Despliegues => Jaime
        Empresa => Andrea 
        Inglés => Virginia

        Mostrarlo en una tabla
-->
<h1>EJERCICIO 1</h1>
<?php 
$profes = [
    "Servidor" => "Alejandra",
    "Cliente" => "Jose Miguel",
    "Interfaces" => "Jose Miguel",
    "Despliegue" => "Jaime",
    "Empresa" => "Andrea",
    "Ingles" => "Virginia",
];
?>
<table>
    <caption>Asignaturas</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Animal</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($profes as $id => $profe){
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$profe</td>";
                echo "</tr>"; 
            } 
        ?>
    </tbody>
</table>

        <!--EJERCICIO 2
            Francisco => 3
            Daniel => 5
            Aurora => 10
            Luis => 7
            Samuel => 9

            MOSTRAR EN UNA TABLA CON 3 COLUMNAS 
            - COLUMNA 1: ALUMNO
            - COLUMNA 2: NOTA
            - COLUMNA 3: SI NOTA < 5, SUSPENSO, ELSE APROBADO
        -->
<?php 
    $alumnos = [
        "Francisco" => 2,
        "Aurora" => 10,
        "Daniel" => 5,
        "Luis" => 7,
        "Samuel" => 9,
    ];
?>
<table>
    <caption>Notas</caption>
    <thead>
        <tr>
            <th>Alumno</th>
            <th>Nota</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($alumnos as $nombre=> $nota){ 
                echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$nota</td>";
                if($nota > 5 && $nota < 10){ ?>
                    <td class="aprobado"><?php echo"Aprobado"; ?> </td>
                <?php }else if($nota == 10){ ?>
                    <td class="matricula"><?php echo"Matricula"; ?></td>
                <?php }
                else{ ?>
                    <td class="suspenso"><?php echo"Suspenso"; ?></td>
                <?php }
                echo "</tr>"  ?>
           <?php } ?>
    </tbody>
</table>
</body>
</html>