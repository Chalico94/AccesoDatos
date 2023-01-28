<?php

require_once("rankingutils.php");

$myconnection = conectarDB();

var_export($myconnection);

// $miFila = getHortalizaFromTam($myconnection, 20);

// var_export($miFila);

// echo "El color es ".$miFila["COLOR"];

/*
if (isset($_POST['tamano'])) {
$miConjuntoFilas = getAllHortalizasFromTam2($myconnection, $_POST['tamano']);
var_export($miConjuntoFilas);
}
$miFila2 = getAllHortalizasFromTam2($myconnection, 20);
var_export($miFila2);
*/

?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prueba DB</title>
</head>

<body>
	<form action="pagina2_db_inmazo.php" method="POST">

		<h2> Nombre </h2>
		<input type="text" name="nombre" id="nombre" placeholder="nombre...">
		<h2> Color </h2>
		<input type="text" name="descripcion" id="descripcion" placeholder="descripcion...">

		<button>Enviar</button>

		<!-- onclick="getAllHortalizasFromTam($myconnection, $_GET['tamano'])" -->

	</form>

</body>

</html>