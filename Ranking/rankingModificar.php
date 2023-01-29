<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <form >
    <input type="submit" name="insertar" value="Insertar">
    <input type="submit" name="modificar" value="Modificar">
    <input type="submit" name="eliminar" value="Eliminar">
    </form>
    <?php
    
    if(isset($_POST['insertar'])){
        echo header('Location: rankingInsertar.php');
    }
    if(isset($_POST['modificar'])){
        echo header('Location: rankingModificar.php');
    }
    if(isset($_POST['eliminar'])){
        echo header('Location: RankingEliminar.php');
    }
    ?>
</body>
</html>