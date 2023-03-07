<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Injection</title>
</head>

<body>
    <?php
    require_once("dbutils.php");
    if (isset($_POST["test"]))
        var_export(getAllWords(conectarDB()));
    ?>
    <form action="test_dbutils.php" method="post">
        <input type="submit" value="Test" name="test" />
    </form>
</body>

</html>