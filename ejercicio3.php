<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php 
        $file = simplexml_load_file("libreria.xml");
   
        printf ("<b>Libro 2:</b><br>Autor: %s<br>Título: %s<br>Género: %s<br>Precio: %s<br>Fecha de publicación: %s<br>Descripción: %s", $file->book[1]->author,  $file->book[1]->title,  $file->book[1]->genre,  $file->book[1]->price, $file->book[1]->publish_date, $file->book[1]->description);

        echo "<br><br>";

        echo "<table border=\"1\">";
        echo "<tr>";
            echo "<th>Título</th>";
            echo "<th>Género</th>";
            echo "<th>Precio</th>";
        echo "</tr>";
        foreach ($file as $libros) {
            echo "<tr>";
            echo "<td>".$libros->title."</td>";
            echo "<td>".$libros->genre."</td>";
            echo "<td>".$libros->price."</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<br><br>";

        $hijo=$file->addChild("book");
        $hijo->addAttribute("id", "20");
        $hijo->addChild("author", "Pepe");
        $hijo->addChild("title", "Pepe y peon");
        $hijo->addChild("genre", "Risa");
        $hijo->addChild("price", "50");
        $hijo->addChild("publish_date", "2000-01-10");
        $hijo->addChild("description", "aburrido");
        $file->asXML("libreria.xml");
        


        echo "<table border=\"1\">";
        echo "<tr>";
            echo "<th>Título</th>";
            echo "<th>Género</th>";
            echo "<th>Precio</th>";
        echo "</tr>";
        foreach ($file as $libros) {
            echo "<tr>";
            echo "<td>".$libros->author."</td>";
            echo "<td>".$libros->title."</td>";
            echo "<td>".$libros->genre."</td>";
            echo "<td>".$libros->price."</td>";
            echo "<td>".$libros->publish_date."</td>";
            echo "<td>".$libros->description."</td>";
            echo "</tr>";
        }

    ?>
</body>
</html>