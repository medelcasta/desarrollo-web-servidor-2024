<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require('../05-funciones/potencias.php');
        require('../05-funciones/primos.php');
        require('../05-funciones/irpf.php');
        require('../05-funciones/iva.php');
    ?>
</head>
<body>
    <form action="" method="post">
        <h3>Potencias</h3>
        <label for="base">Base</label>
        <input type="text" name="base" id="base" placeholder="Introduce la base">
        <label for="exponente">Exponente</label>
        <input type="text" name="exponente" id="exponente" placeholder="Introduce el exponente">
        <input type="hidden" name="accion" value="formulario_potencias">
        <input type="submit" value="Calcular">
    </form>
    <?php 
        $base = $_POST["base"];
        $exponente = $_POST["exponente"];
        $res = 1;
        calcularPotencia($base, $exponente);
    ?>

    <form action="" method="post">
        <h3>Calculadora de Primos</h3>
        <label for="num1">Número 1: </label>
        <input type="text" name="num1" id="num1">
        <label for="num2">Número 2: </label>
        <input type="text" name="num2" id="num2">
        <input type="hidden" name="accion" value="formulario_potencias">
        <input type="submit" value="calcular">
    </form>

    <?php 
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $mayor;
        $menor;
        $esPrimo = true;
        $cont = 0;
        calcularPrimos($num1, $num2);
    ?>

    <form action="" method="post">
        <h3>Calculadora de IRPF</h3>
        <label>Salario Bruto</label>
        <input type="text" name="bruto">
        <input type="submit" value="Calcular">
    </form>

    <?php 
        $bruto = $_POST["bruto"];
        salario($bruto);
    ?>

    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select>
        <input type="submit" value="Calcular">
    </form>

    <?php 
        
            $precio = $_POST["precio"];
            $iva = $_POST["iva"];

            calcularIVA($precio, $iva);

    ?>

</body>
</html>