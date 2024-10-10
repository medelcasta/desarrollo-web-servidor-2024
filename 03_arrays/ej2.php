<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $numeros = [];
    for ($i = 0; $i < 10; $i++) {
        $num_rand = rand(0, 100);
        $numeros[$i] = $num_rand;
    }
    print_r($numeros);
    arsort($numeros);
    print_r($numeros);
    asort($numeros);
    print_r($numeros);
    ?>
</body>
</html>