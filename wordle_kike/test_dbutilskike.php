<?php

require_once("dbutils.php");
$conexion = conectarDB();


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Injection</title>
</head>

<body>
    <?php
    require_once("dbutils.php");
    if (isset($_POST["test"]))
        var_export(getAllWords($conexion));

    $arrayPalabras = [];
    $palabras = getAllWords($conexion);
    $arrayPalabras = $palabras;

    $maximoPalabras = count($arrayPalabras);
    echo " Palabras: " . count($arrayPalabras);
    $min = 0;
    $aleatorio = rand($min, $maximoPalabras);

    echo "Palabra:" . $arrayPalabras[$aleatorio]["nombre"];

    /*  $palabra = getPalabra($conexion, $aleatorio);
    echo "Palabra sacada:" . $palabra; */




    ?>
    <form action="test_dbutils.php" method="post">
        <input type="submit" value="Test" name="test" />
    </form>
</body>

</html>