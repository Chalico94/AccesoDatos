<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        echo '<option value=".'$cont++.'">'.$fila.'</option>';
      }
      ?>
            

           
        </select>
    </div>
</body>
</html>