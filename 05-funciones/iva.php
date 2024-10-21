<?php   
function calcularIVA($precio, $iva){    
    $pvp = match($iva){
        "general" => $precio * 1.21,
        "reducido" => $precio * 1.1,
        "superreducido" => $precio * 1.04,
    };
    echo "<h1>El PVP seria: $pvp</h1>";
}
            
?>