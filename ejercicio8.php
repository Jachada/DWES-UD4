<?php
    include "ejercicio7.php";
?>
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

        $sql = "SELECT * FROM turista";
        $turistas = $conn->query($sql);
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Direccion</th>";
            echo "</tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
                echo "<td>".$turista['nombre']."</td>";  
                echo "<td>".$turista['apellido1']."</td>"; 
                echo "<td>".$turista['direccion']."</td>"; 
            echo "</tr>";
        }

        echo "<br>";

        $sql = "SELECT * FROM turista";
        $turistas = $conn->query($sql);
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Direccion</th>";
            echo "</tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
                echo "<td>".$turista[1]."</td>";  
                echo "<td>".$turista[2]."</td>"; 
                echo "<td>".$turista[4]."</td>"; 
            echo "</tr>";
        }

        echo "<br>";

        $sql = "SELECT * FROM turista";
        $turistas = $conn->query($sql);
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Direccion</th>";
            echo "</tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_BOTH)) {
            echo "<tr>";
                echo "<td>".$turista[1]."</td>";  
                echo "<td>".$turista['apellido1']."</td>"; 
                echo "<td>".$turista[4]."</td>"; 
            echo "</tr>";
        }

        echo "<br>";

        $sql = "SELECT * FROM turista";
        $turistas = $conn->query($sql);
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Direccion</th>";
            echo "</tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
                echo "<td>".$turista->nombre."</td>";  
                echo "<td>".$turista->apellido1."</td>"; 
                echo "<td>".$turista->direccion."</td>"; 
            echo "</tr>";
        }

        echo "<br>";

        $sql = "SELECT * FROM turista";
        $turistas = $conn->query($sql);
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Direccion</th>";
            echo "</tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_LAZY)) {
            echo "<tr>";
                echo "<td>".$turista['nombre']."</td>";  
                echo "<td>".$turista->apellido1."</td>"; 
                echo "<td>".$turista[4]."</td>"; 
            echo "</tr>";
        }

        echo "<br>";
    
        $sql = "SELECT * FROM turista";
        $turistas = $conn->query($sql);
        $turistas->execute();
        $turistas->bindColumn(2, $nombre);
        $turistas->bindColumn(3, $apellido);
        $turistas->bindColumn('direccion', $direccion);
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Direccion</th>";
            echo "</tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_BOUND)) {
            echo "<tr>";
                echo "<td>".$nombre."</td>";  
                echo "<td>".$apellido."</td>"; 
                echo "<td>".$direccion."</td>"; 
            echo "</tr>";
        }

        echo "<br>";
    } catch (PDOException $e) {
        echo "Connection fallida: ". $e->getMessage();
    }
    $conn = null;   // Cerrar la conexión
    ?>
</body>
</html>