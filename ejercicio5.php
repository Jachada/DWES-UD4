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
        @$mysqli = mysqli_connect("localhost", "developer", "root", "agenciaviajes");
        $error = mysqli_connect_errno();
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos: ", mysqli_error($mysqli), "</p>";
            exit();
        } else {
            echo "Conectado correctamente";
            echo "<br>";
        }

        //var_dump($result);
        echo "<br><br>";

        // INSERTAR
        $insert = mysqli_query($mysqli, "INSERT INTO `vuelos` (Origen, Destino, Fecha, Compania, ModeloAvion) VALUES ('Valencia', 'Italia', '2021-10-25 10:30:00', 'S0S', 'AD105')");
        if ($insert == false) {
            echo "La consulta no ha funcionado correctamente<br>";
        } else {
            echo "Se han Insertado: ", mysqli_affected_rows($mysqli), " filas.<br>";
            echo "<br>";
            echo "El id del último elemento añadido es: ", mysqli_insert_id($mysqli), "<br>";
        }

        // ACTUALIZAR
        $update = mysqli_query($mysqli, "UPDATE `vuelos` SET `Origen`='Barcelona' WHERE `id`='14'");
        if ($update == false) {
            echo "La consulta no ha funcionado correctamente<br>";
        } else {
            echo "Se han actualizado: ", mysqli_affected_rows($mysqli), " filas.<br>";
        }

        // BORRAR
        $delete = mysqli_query ($mysqli, "DELETE FROM `vuelos` WHERE Origen='Madrid'");
        if ($delete == false) {
            echo "La consulta no ha funcionado correctamente<br>";
        } else {
            echo "Se han borrado: ", mysqli_affected_rows($mysqli), " filas.<br>";
        }

        

        // MOSTRAR TABLA
        $select = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        if ($select == false) {
            echo "La consulta no ha funcionado";
        } else {
            echo "<table border='1'>";
                echo "<tr>";
                    while ($fila = mysqli_fetch_assoc($select)) {
                        echo "<tr>";
                        echo "<td>", $fila["id"], "</td>";
                        echo "<td>", $fila["Origen"], "</td>";
                        echo "<td>", $fila["Destino"], "</td>";
                        echo "<td>", $fila["Fecha"], "</td>";
                        echo "<td>", $fila["Compania"], "</td>";
                        echo "<td>", $fila["ModeloAvion"], "</td>";
                        echo "</tr>";
                    }
                echo "</tr>";
            echo "</table>";
        }
        
        mysqli_close($mysqli);
    ?>
</body>
</html>