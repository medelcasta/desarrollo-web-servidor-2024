<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $pares = [];
    for ($i = 1; $i <= 50; $i++) {
        if ($i %2== 0) {
            $pares[] = $i;
        }
    }
    shuffle($pares);
    print_r($pares);

    arsort($pares);
    print_r($pares);
    
    ?>
</body>
</html>