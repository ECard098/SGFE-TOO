<?php

if (!empty($_POST["btnRegistrarReservacion"])) {
    if (!empty($_POST["clienteId"]) and !empty($_POST["fechaR"]) and !empty($_POST["fechaIniR"]) and !empty($_POST["fechaFinR"]) and !empty($_POST["salaId"]) and !empty($_POST["planPaquete"]) and !empty($_POST["planId"])) {


        $IdCliente = $_POST["clienteId"];
        $fechaReservacion = $_POST["fechaR"];
        $fechaInicio = $_POST["fechaIniR"];
        $fechaFin = $_POST["fechaFinR"];
        $IdSala = $_POST["salaId"];
        $IdPaquete = $_POST["planPaquete"];
        $IdPlan = $_POST["planId"];

        //Modificar luego la tabla de reservaciones por los datos erroneos

        $sql = $conexion->query("INSERT INTO reservaciones(fechaReservacion, fechaInicio, fechaFin, idPlanPago, idSala, idCliente, idPaquete) VALUES('$fechaReservacion', '$fechaInicio', '$fechaFin', '$IdPlan', '$IdSala', '$IdCliente', '$IdPaquete')");

        if ($sql) {
            echo '<div class="alert alert-success">Reservación registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Ocurrió un error SQL: ' . $conexion->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Ocurrió un error SQL: ' . $conexion->error . '</div>';
    }
}
