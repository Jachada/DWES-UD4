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
        crearConexion();
        echo"<br>";
        creaVuelo("París", "Sevilla", "2021-11-30 10:30:00", "E1FF3L", "T0RR3");
        echo"<br>";
        modificaDestino("Madrid", 41);
        echo"<br>";
        modificaCompania("N1N0", 41);
        echo"<br>";
        eliminaVuelo(42);
        echo"<br>";
        $Vuelos = extraeVuelos();
        while($fila = $Vuelos->fetch_assoc()){
            print_r($fila);
            echo "<br>";
        } 
    ?>
</body>
</html>