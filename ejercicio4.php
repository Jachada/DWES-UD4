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

        $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        $result2 = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        $result3 = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        $result4 = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        //var_dump($result);
        echo "<br><br>";

        if ($result == false) {
            echo "La consulta no ha funcionado";
        } else {
            /*while ($fila = mysqli_fetch_assoc($result)) {
                print_r($fila);
                echo "<br>";
                echo $fila["Destino"];
                echo "<br>";
            }*/

            echo "<table border='1'>";
                echo "<tr>";
                    while ($fila = mysqli_fetch_assoc($result)) {
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

            echo "<br>";


            echo "<table border='1'>";
                echo "<tr>";
                    while ($fila2 = mysqli_fetch_object($result2)) {
                        echo "<tr>";
                        echo "<td>", $fila2->id, "</td>";
                        echo "<td>", $fila2->Origen, "</td>";
                        echo "<td>", $fila2->Destino, "</td>";
                        echo "<td>", $fila2->Fecha, "</td>";
                        echo "<td>", $fila2->Compania, "</td>";
                        echo "<td>", $fila2->ModeloAvion, "</td>";
                        echo "</tr>";
                    }
                echo "</tr>";
            echo "</table>";

            echo "<br>";

            echo "<table border='1'>";
                echo "<tr>";
                    while ($fila3 = mysqli_fetch_array($result3)) {
                        echo "<tr>";
                        echo "<td>", $fila3["id"], "</td>";
                        echo "<td>", $fila3["Origen"], "</td>";
                        echo "<td>", $fila3["Destino"], "</td>";
                        echo "<td>", $fila3["Fecha"], "</td>";
                        echo "<td>", $fila3["Compania"], "</td>";
                        echo "<td>", $fila3["ModeloAvion"], "</td>";
                        echo "</tr>";
                    }
                echo "</tr>";
            echo "</table>";

            echo "<br>";


            echo "<table border='1'>";
                echo "<tr>";
                    while ($fila4 = mysqli_fetch_row($result4)) {
                        echo "<tr>";
                        echo "<td>", $fila4[0], "</td>";
                        echo "<td>", $fila4[1], "</td>";
                        echo "<td>", $fila4[2], "</td>";
                        echo "<td>", $fila4[3], "</td>";
                        echo "<td>", $fila4[4], "</td>";
                        echo "<td>", $fila4[5], "</td>";
                        echo "</tr>";
                    }
                echo "</tr>";
            echo "</table>";
        }
    ?>
</body>
</html>