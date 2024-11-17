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

        //capturar el precio
        $mont = 0;
        if($IdPaquete == 1){
            $mont = 500.00;
        }else{
            if($IdPaquete == 2){
                $mont = 1200.00;
            }else{
                $monto = 2500.00;
            }
        }

        //Modificar luego la tabla de reservaciones por los datos erroneos

        $sql = $conexion->query("INSERT INTO reservaciones(fechaReservacion, fechaInicio, fechaFin, id_PlanPago, id_Sala, id_Cliente, id_Paquete) VALUES('$fechaReservacion', '$fechaInicio', '$fechaFin', '$IdPlan', '$IdSala', '$IdCliente', '$IdPaquete')");
        $sql2 = $conexion->query("INSERT INTO pagos(idCliente, monto) values('$IdCliente', '$mont')");
        $sql3 = $conexion->query("Update sala SET estadoSala = 'Ocupada' where id_Sala = '$IdSala'");
        if ($sql && $sql2) {
            echo '<div class="alert alert-success">Reservación registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Ocurrió un error SQL: ' . $conexion->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Ocurrió un error SQL: ' . $conexion->error . '</div>';
    }
}
