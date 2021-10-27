<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php 
        $file = fopen("locations.csv", "a");
        $arrayMeter = ["Sevilla", "No tengo ni idea de la latitud y longitud"];
        fputcsv($file, $arrayMeter);
        fclose($file);

        $file = fopen("locations.csv", "r");
        echo "<table border=\"1\">";
        while ($datos = fgetcsv($file, ",")) {
            echo "<tr>";
                echo "<td>$datos[0]</td>";
                echo "<td>$datos[1]</td>";
            echo "</tr>";
        }
        echo "</table>";
        fclose($file);

    ?>
</body>
</html>