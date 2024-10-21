<?php 

    function calcularPotencia($base, $exponente){
        $base = $_POST["base"];
        $exponente = $_POST["exponente"];
        $res = 1;
        if($base != '' and $exponente != ''){
            for($i = 0; $i < $exponente; $i++){
                $res *= $base;
            }
            echo "<h3>El resultado es: $res</h3>";
        }else{
            echo "<p>Te faltan datos</p>";
        }
    }
?>