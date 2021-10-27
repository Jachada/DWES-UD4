<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php 
        $file = fopen("starWars.txt", "r");
        echo "<table border=\"1\">";
        do {
            $datos = fgets($file);

            list($nombre, $altura, $peso, $colorPelo, $colorPiel, $colorOjos, $edad, $genero, $procedencia, $especie) = explode(",", $datos);

            echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$altura</td>";
                echo "<td>$peso</td>";
                echo "<td>$colorPelo</td>";
                echo "<td>$colorPiel</td>";
                echo "<td>$colorOjos</td>";
                echo "<td>$edad</td>";
                echo "<td>$genero</td>";
                echo "<td>$procedencia</td>";
                echo "<td>$especie</td>";
            echo "</tr>";

        } while (feof($file) != true);
        echo "</table>";

        //fwrite($file, "\nRufo Carmen,159,75,brown,light,brown,22,female,Human"); 

        fclose($file);
        


    ?>
</body>
</html>