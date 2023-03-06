<!DOCTYPE html>
<?php
    var_export($_POST);
    //Obtener las letras ingresadas por el usuario a través de un formulario HTML y almacenarlas en una variable en PHP
    if(isset($_POST['letras'])){
        $letras_ingresadas = $_POST['letras'];
    }
?>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle dinamico</title>
    <style>
        .caja{
            align-items: center;
            border: 2px solid #dee1e9;
            font-size: 28px;
            font-weight: 700;
            height: 56px;
            margin: 3px;
            text-transform: uppercase;
            text-align: center;
            width: 56px;
            border-radius: 5px;
            color: #393e4c;
            background: #fbfcff;
        }
        </style>
</head>
<body>
    <div class="contanier">
        <form action="app.php" method="post">
            <div class="row">
                <input  class="caja" type="text" value="">
                <input  class="caja" type="text" value="">
                <input  class="caja" type="text" value="">
                <input  class="caja" type="text" value="">
                <input  class="caja" type="text" value="">
            </div>       
            <div class="row m-4">
                <div class="col-4">
                    <br/>
                <input type="submit" name="letras" value="Validar"/>
                </div>
            </div>
        </form>
        <?php 
            //Convertir las letras ingresadas por el usuario en un array para poder manipularlas fácilmente
            $letras_array = str_split($letras_ingresadas);
            //Comparar cada letra ingresada por el usuario con las letras de la palabra secreta. Si la letra está en la palabra secreta y se encuentra en la misma posición, imprimir una letra verde. Si la letra está en la palabra secreta pero no está en la misma posición, imprimir una letra amarilla. Si la letra no está en la palabra secreta, imprimir una letra gris
            foreach($letras_array as $letra){
                if(strpos($palabra_secreta, $letra) !== false){
                  if($palabra_secreta[array_search($letra, $letras_array)] === $letra){
                    echo '<span style="color:green;">'.$letra.'</span>';
                  } else {
                    echo '<span style="color:yellow;">'.$letra.'</span>';
                  }
                } else {
                  echo '<span style="color:grey;">'.$letra.'</span>';
                }
              }
        ?>
    </div>
</body>
</html>