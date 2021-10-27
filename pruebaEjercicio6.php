<?php
    include "ejercicio6.php";
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
        creaVuelo("Barcelona", "China", "2021-11-25 10:30:00", "CH1N0", "M4L0");
        echo"<br>";
        modificaDestino("Barcelona", 2);
        echo"<br>";
        modificaCompania("CH1N0", 2);
        echo"<br>";
        eliminaVuelo(11);
        echo"<br>";
        extraeVuelos(1);  
    ?>
</body>
</html>