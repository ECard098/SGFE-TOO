<?php

if (!empty($_POST["btnModificarReservacion"])) {
    if (!empty($_POST["fechaIniR"]) && !empty($_POST["fechaFinR"]) && !empty($_POST["salaId"]) && !empty($_POST["planPaquete"]) && !empty($_POST["planId"])) {

        // Obtener los valores del formulario
        $fechaInicio = $_POST["fechaIniR"];
        $fechaFin = $_POST["fechaFinR"];
        $IdSala = $_POST["salaId"];
        $IdPaquete = $_POST["planPaquete"];
        $IdPlan = $_POST["planId"];
        $idReservacion = $_GET["id"]; // Obtener el id de la reservación

        // Asegúrate de que el ID de la reservación es válido
        if (!empty($idReservacion)) {
            // Modificar la tabla de reservaciones con los datos proporcionados
            $sql = $conexion->query("UPDATE reservaciones 
                                     SET fechaInicio = '$fechaInicio', 
                                         fechaFin = '$fechaFin', 
                                         id_PlanPago = '$IdPlan', 
                                         id_Sala = '$IdSala', 
                                         id_Paquete = '$IdPaquete' 
                                     WHERE id_Reservacion = '$idReservacion'");

            if ($sql) {
                echo '<div class="alert alert-success">Reservación modificada correctamente</div>';
            } else {
                echo '<div class="alert alert-danger">Ocurrió un error SQL: ' . $conexion->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger">ID de reservación no válido</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Por favor, complete todos los campos requeridos.</div>';
    }
}


