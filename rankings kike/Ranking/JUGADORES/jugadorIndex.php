<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Timeline</title>
</head>
<body>
    <?php
        require_once("../rankingutils.php");
        $conDB = conectarDB();
        $resultados = getAllMazosFromNombre($conDB, "");
        $cont=0;
    ?>
    <h1>Timeline</h1>
    <div class="contanier"> 
        <select class="form-select" aria-label="Default select example">
        <option selected>Eligen un mazo</option>
        <?php
      foreach ($resultados as $fila) {
        echo '<option value="'.$cont++.'">'.$fila['NOMBRE'].'</option>';
      }
      ?>
        </select>
    </div class="row">
    <form action="jugadorPuntos.php" method="POST">
    <br/>
    <input type="submit" name="Jugar" value="jugar" class="btn btn-primary btn-lg" />
  </form>
    </div>
</body>
</html>