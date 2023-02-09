<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <title>JugadorPuntos</title>
</head>

<body>
    <div class="contanier">
        <h1>Timeline</h1>
        <br />
        <form action="jugadorRanking.php" method="POST">
            <input type="text" name="puntos" placeholder="Poner Puntos" class="form-control"
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
            <br />
            <input type="submit" value="Game Over" class="btn btn-primary btn-lg" />
        </form>
    </div>
    </br>
    <div class="boton_volver">
        <button type="button" class="btn btn-success" onclick="location.href='../rankingIndex.html'">Volver</button>
    </div>
</body>

</html>