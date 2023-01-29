<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina respuesta con tabla</title>
</head>

<body>

    <?php
    require_once("rankingutils.php");
    var_export($_POST);
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $id = $_POST["id"];
    $conDB = conectarDB();


    /*$idInsertado = insertarMazo($conDB, $nombre, $descripcion);
    var_export($idInsertado);
    if ($idInsertado == 0) {
    echo '<script>alert("NO SE HA PODIDO INSERTAR");
    location.href="pagina1_db_inmazo.php"</script>';
    }*/


    /* MODIFICAR MAZO DESCRIPCION Y NOMBRE POR ID */
    $mazoModificado = modificarMazoNombreDescripcionPorId($conDB, $id, $nombre);
    /* Borrar mazo con nombre x e id y*/
    //$numBorradas = borrarMazoPorIdNombre($conDB, $id, $nombre);
    // echo '<script>alert("Las borradas son ' . $numBorradas . '"); </script>';
    
    // sacar todas los mazos con nombre */
    $resultados = getAllMazosFromNombre($conDB, $nombre);







    /*for($i = 0 ; $i < count($resultados) ; $i++){
    echo "El nombre es: ".$resultados[$i]["NOMBRE"]." El color es: ".$resultados[$i]["COLOR"]." El tamaño es: ".$resultados[$i]["TAM"];
    }*/
    ?>
    <table border="2px">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>

        </tr>
        <?php
        foreach ($resultados as $fila) {
            echo "<tr><td>" . $fila["NOMBRE"] . "</td><td>" . $fila["DESCRIPCION"] . "</td></tr>";
        }
        ?>
    </table>


</body>

</html>