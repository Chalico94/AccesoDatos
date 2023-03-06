<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones del Mazo</title>
</head>

<body>
    <?php
    function conectarDB()
    {

        try {
            $db = new PDO("mysql:host=localhost;dbname=db_rankings;charset=utf8mb4", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $ex) {
            echo ("Error al conectar" . $ex->getMessage());
        }

    }

    // UPDATE
    function modificarMazoNombrePorId($conDb, $id, $nombre, $descripcion)
    {
        $result = 0;
        try {
            $sql = "UPDATE MAZOS SET NOMBRE=:nombre, DESCRIPCION=:descripcion WHERE ID=:id";
            $stmt = $conDb->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->execute();
            $result = $stmt->rowCount();
        } catch (PDOException $ex) {
            echo ("Error en modificarMazo Nombre Descripcion por ID" . $ex->getMessage());
        }
        return $result;

    }

    // INSERT
    function insertarMazo($conDb, $nombre, $descripcion)
    {

        try {
            $sql = "INSERT INTO MAZOS(NOMBRE, DESCRIPCION) VALUES (:NOMBRE, :DESCRIPCION)";
            $stmt = $conDb->prepare($sql);
            $stmt->bindParam(':NOMBRE', $nombre);
            $stmt->bindParam(':DESCRIPCION', $descripcion);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo ("Error en insertarMazo" . $ex->getMessage());
        }
        return $conDb->lastInsertId();
    }

    // DELETE mazo por id y nombre
    function borrarMazoPorIdNombre($conDb, $id, $nombre)
    {
        $result = 0;
        try {
            $sql = "DELETE FROM MAZOS WHERE ID=:id AND NOMBRE=:nombre";
            $stmt = $conDb->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            $result = $stmt->rowCount();
        } catch (PDOException $ex) {
            echo ("Error en borrarHortaliza" . $ex->getMessage());
        }
        return $result;
    }


    function getAllMazosFromNombre($conDb, $nombre)
    {

        $vectorTotal = array();
        try {
            $arr = array();
            $sql = "SELECT * FROM MAZOS";
            if ($nombre != "") {
                $arr[":nomAux"] = $nombre;
                $sql = "SELECT * FROM MAZOS WHERE NOMBRE=:nomAux";
            }
            //if (count($arr) == 2)
            // $sql = "SELECT * FROM MAZO WHERE C=:colorAux";
            $stmt = $conDb->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute($arr);
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $vectorTotal[] = $fila;
            }
        } catch (PDOException $ex) {
            echo ("Error al conectar" . $ex->getMessage());
        }
        return $vectorTotal;
    }



    // ------------ FUNCIONES DE CARTAS ----------------- //
    function getAllCartasFromNombre($conDb, $nombre)
    {

        $vectorTotal = array();
        try {
            $arr = array();
            $sql = "SELECT * FROM CARTAS";
            if ($nombre != "") {
                $arr[":nomAux"] = $nombre;
                $sql = "SELECT * FROM CARTAS WHERE NOMBRE=:nomAux";
            }
            //if (count($arr) == 2)
            // $sql = "SELECT * FROM MAZO WHERE C=:colorAux";
            $stmt = $conDb->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute($arr);
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $vectorTotal[] = $fila;
            }
        } catch (PDOException $ex) {
            echo ("Error al conectar" . $ex->getMessage());
        }
        return $vectorTotal;
    }



    // UPDATE
    function modificarCartaNombrePorId($conDb, $id, $nombre, $ano)
    {
        $result = 0;
        try {
            $sql = "UPDATE CARTAS SET NOMBRE=:nombre, ANO=:ano WHERE ID=:id";
            $stmt = $conDb->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ano', $ano);
            $stmt->execute();
            $result = $stmt->rowCount();
        } catch (PDOException $ex) {
            echo ("Error en modificarCarta Nombre Descripcion por ID" . $ex->getMessage());
        }
        return $result;

    }

    // INSERT
    function insertarCarta($conDb, $nombre, $ano, $imagen, $mazo)
    {

        try {
            $sql = "INSERT INTO CARTAS(NOMBRE, ANO, IMAGEN, ID_MAZO) VALUES (:NOMBRE, :ANO, :IMAGEN, :ID_MAZO)";
            $stmt = $conDb->prepare($sql);
            $stmt->bindParam(':NOMBRE', $nombre);
            $stmt->bindParam(':ANO', $ano);
            $stmt->bindParam(':IMAGEN', $imagen);
            $stmt->bindParam(':ID_MAZO', $mazo);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo ("Error en insertar Carta" . $ex->getMessage());
        }
        return $conDb->lastInsertId();
    }

    // DELETE mazo por id y nombre
    function borrarCartaPorIdNombre($conDb, $id, $nombre)
    {
        $result = 0;
        try {
            $sql = "DELETE FROM CARTAS WHERE ID=:id AND NOMBRE=:nombre";
            $stmt = $conDb->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            $result = $stmt->rowCount();
        } catch (PDOException $ex) {
            echo ("Error en borrarCarta" . $ex->getMessage());
        }
        return $result;
    }


    /* FUNCIONES DE JUGADORES */
    // Insertar Jugador ID Nombre Puntos
    
    function insertarJugador($conDb, $nombre, $puntos)
    {

        try {
            $sql = "INSERT INTO CARTAS(NOMBRE, PUNTOS) VALUES (:NOMBRE, :PUNTOS)";
            $stmt = $conDb->prepare($sql);
            $stmt->bindParam(':NOMBRE', $nombre);
            $stmt->bindParam(':PUNTOS', $puntos);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo ("Error en insertar Carta" . $ex->getMessage());
        }
        return $conDb->lastInsertId();
    }
    // Mostrar ID Nombre y Puntos
    function getAllJugadoresFromNombre($conDb, $nombre)
    {

        $vectorTotal = array();
        try {
            $arr = array();
            $sql = "SELECT * FROM JUGADORES";
            if ($nombre != "") {
                $arr[":nomAux"] = $nombre;
                $sql = "SELECT * FROM JUGADORES WHERE NOMBRE=:nomAux";
            }
            //if (count($arr) == 2)
            // $sql = "SELECT * FROM MAZO WHERE C=:colorAux";
            $stmt = $conDb->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute($arr);
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $vectorTotal[] = $fila;
            }
        } catch (PDOException $ex) {
            echo ("Error al conectar" . $ex->getMessage());
        }
        return $vectorTotal;
    }

    // Ordenar puntuaciones
    
    function getAllJugadoresOrdenado($conDb, $nombre)
    {

        $vectorTotal = array();
        try {
            $arr = array();
            $sql = "SELECT * FROM JUGADORES ORDER BY PUNTOS DESC";
            if ($nombre != "") {
                $arr[":nomAux"] = $nombre;
                $sql = "SELECT * FROM JUGADORES WHERE NOMBRE=:nomAux";
            }
            //if (count($arr) == 2)
            // $sql = "SELECT * FROM MAZO WHERE C=:colorAux";
            $stmt = $conDb->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute($arr);
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $vectorTotal[] = $fila;
            }
        } catch (PDOException $ex) {
            echo ("Error al conectar" . $ex->getMessage());
        }
        return $vectorTotal;
    }





    ?>
</body>

</html>