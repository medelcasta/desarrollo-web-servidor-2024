<?php 

    function calcularPotencia($base, $exponente){
        $res = 1;
        for($i = 0; $i < $exponente; $i++){
            $res *= $base;
        }
        return "<h3>El resultado es: $res</h3>";
    }
?>