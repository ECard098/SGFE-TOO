<?php
if (isset($_POST['btnRegistrarSala'])) {

    $nombreSala = $_POST['nombreSala'];
    $capacidad = $_POST['capacidad'];
    $estadoSala = $_POST['estadoSala'];

    include "../Modelo/conexion.php";

    // Inserción con el idReservacion
    $sql = "INSERT INTO sala (nombreSala, capacidad, estadoSala) 
            VALUES ('$nombreSala', '$capacidad', '$estadoSala')";

    if ($conexion->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Sala registrada correctamente</div>';
    } else {
        echo "Error al registrar la sala: " . $conexion->error;
    }
}
?>
