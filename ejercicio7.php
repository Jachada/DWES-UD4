<?php 
    function crearConexion() {
        $mysqli = new mysqli ("localhost", "developer", "root", "agenciaviajes");
        $error = $mysqli -> connect_errno;
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos: ", $mysqli -> connect_error, "</p>";
            exit();
        }
        return $mysqli;
    }

    // INSERTAR
    function creaVuelo($origen, $destino, $fecha, $compania, $modeloAvion) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "INSERT INTO `vuelos` (Origen, Destino, Fecha, Compania, ModeloAvion) VALUES (?, ?, ?, ?, ?)";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt -> bind_param("sssss", $origen, $destino, $fecha, $compania, $modeloAvion);
            $retorno = $stmt ->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }
        
    // ACTUALIZAR
    function modificaDestino($destino, $id) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Destino`=? WHERE `id`=?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("si", $destino, $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }

        
    function modificaCompania($compania, $id) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Compania`=? WHERE `id`=?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("si", $compania, $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }
        

    function eliminaVuelo($id) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "DELETE FROM `vuelos` WHERE id=?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        return $retorno;
    }

    function extraeVuelos() {
        $mysqli = crearConexion();
        $sql = "SELECT * FROM vuelos";
        $result = $mysqli->query($sql);
        return $result;
    }

?>