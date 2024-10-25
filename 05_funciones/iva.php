<?php   
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);

    function calcularIVA($precio, $iva){    
        $pvp = match($iva){
            "GENERAL" => $precio * 1.21,
            "REDUCIDO" => $precio * 1.1,
            "SUPERREDUCIDO" => $precio * 1.04,
        };
        return $pvp;
    }         
?>