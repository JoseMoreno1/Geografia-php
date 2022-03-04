<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Binario</title>
</head>
<body>

<?php  

function examen ($num) {

$r = 0;
$v = 0;
$i = 1;

    while ($num > 0) {

        $r = ($num % 2);
        $num =  ($num / 2);
        $v = $v + ($r * $i);
        $i = $i * 10;
    }
}

?> 

</body>
</html>