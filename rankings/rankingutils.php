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

            $db = new PDO("mysql:host=localhost;dbname=rankings;charset=utf8mb4", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;

        } catch (PDOException $ex) {

            echo ("Error al conectar" . $ex->getMessage());
        }

    }


    // UPDATE
    function modificarMazoNombreDescripcionPorId($conDb, $id, $nombre, $descripcion)
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




    // Todo hacer esta funcion y arreglar resultados en pagina2_db_in
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


    ?>





</body>

</html>