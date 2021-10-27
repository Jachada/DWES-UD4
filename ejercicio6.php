<?php

    function crearConexion() {
        @$mysqli = mysqli_connect("localhost", "developer", "root", "agenciaviajes");
        $error = mysqli_connect_errno();
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos: ", mysqli_error($mysqli), "</p>";
            exit();
        }
        return $mysqli;
    }

    // INSERTAR
    function creaVuelo($origen, $destino, $fecha, $compania, $modeloAvion) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "INSERT INTO `vuelos` (Origen, Destino, Fecha, Compania, ModeloAvion) VALUES (?, ?, ?, ?, ?)";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $origen, $destino, $fecha, $compania, $modeloAvion);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }
        
    // ACTUALIZAR
    function modificaDestino($destino, $id) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Destino`=? WHERE `id`=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $destino, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        return $retorno;
    }
 
    function modificaCompania($compania, $id) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Compania`=? WHERE `id`=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $compania, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        return $retorno;
    }
        
    function eliminaVuelo($id) {
        $mysqli = crearConexion();
        $retorno = false;
        $sql = "DELETE FROM `vuelos` WHERE id=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        return $retorno;
    }

    function extraeVuelos() {
        $mysqli = crearConexion();
        $sql = "SELECT * FROM vuelos WHERE id=?";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    ?>