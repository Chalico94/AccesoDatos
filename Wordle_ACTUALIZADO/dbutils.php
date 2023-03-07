<<?php
function conectarDB()
{
    try {
        $db = new PDO("mysql:host=localhost;dbname=db_wordle;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $ex) {
        echo ("Error al conectar" . $ex->getMessage());
    }
}

function getAllWords($conDB)
{
    $vectorTotal = array();
    try {
        $arr = array();
        $sql = "SELECT * FROM palabras";
        $stmt = $conDB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute($arr);
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vectorTotal[] = $fila;
        }
    } catch (PDOException $ex) {
        echo ("Error al conectar" . $ex->getMessage());
    }
    return $vectorTotal;
}

function getPalabra($con, $id)
{
    try {
        $sql = "SELECT nombre FROM palabras WHERE ID = id";
        $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(":id" => $id));
        $fila = $stmt->fetch();
    } catch (PDOException $ex) {
        echo ("Error getPalabra" . $ex->getMessage());
    }
    return $fila;
}
?>