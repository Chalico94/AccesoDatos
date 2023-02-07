<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Ranking Jugadores</title>
</head>
<body>
    <div class="contanier">
        <h1>Ranking Jugadores</h1>
        <br/>
    <?php
        var_export($_POST);
        require_once("../rankingutils.php");
        $conDB = conectarDB();
        $resultados =  getAllJugadoresOrdenado($conDB,"");
        $puntos = $_POST['puntos'];
        $letra1 = '<input style="width: 20px;" type="text" name="letra1"/>';
        $letra2 = '<input style="width: 20px;" type="text" name="letra2"/>';
        $letra3 = '<input style="width: 20px;" type="text" name="letra3"/>';
    ?>
     <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Posicion</th>
            <th scope="col">Nombre</th>
            <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < 10; $i++) {
                    if(isset($resultados[$i])){
                        if($resultados[$i]["PUNTOS"]>$puntos){
                            echo '<tr><th scope="col">'.($i+1).'</th><th scope="col">'.$resultados[$i]["NOMBRE"].'</th><th scope="col">'.$resultados[$i]["PUNTOS"].'</th></tr>';
                        }
                        
                        if($resultados[$i-1]["PUNTOS"]>$puntos && $resultados[$i+1]["PUNTOS"]<$puntos){
                            echo '<tr><th scope="col">'.($i+1).'</th><th scope="col">'.$letra1.''.$letra2.''.$letra3.'</th><th scope="col">'.$puntos.'</th></tr>';
                        }
                        
                        if($resultados[$i]["PUNTOS"]<$puntos){
                            echo '<tr><th scope="col">'.($i+1).'</th><th scope="col">'.$resultados[$i]["NOMBRE"].'</th><th scope="col">'.$resultados[$i]["PUNTOS"].'</th></tr>';
                        }         
                          
                    }
                }
            ?>
        </tbody>
    </table>
    <form action="jugadorRanking.php" method="POST">
        <br />
        <input type="submit" name="actualizar" value="Actualizar" class="btn btn-warning" />
    </form>
    <?php
    if(isset($_POST['actualizar'])){

        $nombre =  $_POST['letra1'].$_POST['letra2'].$_POST['letra3'];
        require_once("../rankingutils.php");
        $conDB = conectarDB();
        $resultados =  getAllJugadoresOrdenado($conDb, $nombre);
    }
    ?>
</body>
</html>