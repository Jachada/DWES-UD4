<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHPMYADMIN</title>
</head>
<body>
    <?php 

    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "root";

    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "<br>";
        $conn->beginTransaction();
        $falloConsultas=false;
        
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Carmen', 'Rufo', 'Palomo', 'Casa de Oro', '600602602')";
        $numClientes = $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        echo "Se han añadido $numClientes cliente nuevo con el id: $last_id";
        if ($last_id < 1 || $last_id == $last_id) {
            $falloConsultas = true;
        }
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Evelyn', 'Dorado', 'Rufo', 'Pepon', '601602602')";
        $numClientes = $conn->exec($sql);
        $last_id2 = $conn->lastInsertId();
        echo "Se han añadido $numClientes cliente nuevo con el id: $last_id2";
        if ($last_id < 1 || $last_id2 == $last_id) {
            $falloConsultas = true;
        }

        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Alison', 'Rufo', 'Dorado', 'Muneco', '602602602')";
        $numClientes = $conn->exec($sql);
        $last_id3 = $conn->lastInsertId();
        echo "Se han añadido $numClientes cliente nuevo con el id: $last_id3";
        if ($last_id < 1 || $last_id3 == $last_id2) {
            $falloConsultas = true;
        }

        if ($falloConsultas) {
            $conexion->rollBack();
        } else {
            $conexion->commit();
        }
        echo "<br>";
        $conn=null;
    } catch (PDOException $e) {
        echo "Connection fallida: " . $e->getMessage();   
    }
    $conn=null;
    ?>
</body>
</html>