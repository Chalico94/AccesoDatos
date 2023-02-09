<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <title>Modificar</title>
</head>

<body>
  <?php
  require_once("../rankingutils.php");
  var_export($_POST);
  $id = $_POST["id"];
  $nombre = $_POST["nombre"];
  $ano = $_POST["ano"];
  $conDB = conectarDB();

  $modificado = modificarCartaNombrePorId($conDB, $id, $nombre, $ano);
  var_export($modificado);
  if ($id == 0) {
    echo '<script>alert("NO SE HA PODIDO Modificar la Carta");
            location.href="rankingModificarCarta.php"</script>';
  }
  $resultados = getAllCartasFromNombre($conDB, "")
    ?>
  <table class="table table-dark table-striped">
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Descripcion</th>
    </tr>
    <?php
    foreach ($resultados as $fila) {
      echo "<tr><td>" . $fila["ID"] . "</td><td>" . $fila["NOMBRE"] . "</td><td>" . $fila["ANO"] . "</td></tr>";
    }
    ?>
  </table>
  </br>
  <div class="boton_volver">
    <button type="button" class="btn btn-success" onclick="location.href='../rankingIndex.html'">Volver</button>
  </div>
</body>

</html>