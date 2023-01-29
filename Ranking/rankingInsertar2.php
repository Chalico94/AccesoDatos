<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Insertar</title>
</head>
<body>
    <?php
        require_once("dbutils.php");
        var_export($_POST);
        $nombre= $_POST["nombre"];
        $descripcion = $_PSOT["descripcion"];
        $conDB = conectarDB();

        $idInsertado = insertarMazo($conDB,$nombre,$descripcion);
        var_export($idInsertado);
        if($idInsertado == 0){
            echo '<script>alert("NO SE HA PODIDO INSERTAR");
            location.href="rankingInsertar.php"</script>';  
        }
        $resultado =  getAllMazosFromNombre($conDb, "")
   ?>
   <table border="2px">
      <tr><th>Nombre</th><th>Descripcion</th></tr>
      <?php
        foreach ($resultados as $fila){
          echo "<tr><td>".$fila["NOMBRE"]."</td><td>".$fila["DESCRIPCION"]."</td></tr>" ;
        }
      ?>
    </table>
</body>
</html>