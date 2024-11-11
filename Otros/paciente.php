<?php
session_start();

require_once '../modelos/conexion.php'; // Conexión a la base de datos


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombrePaciente"];
    $apellido = $_POST["apellidoPaciente"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $dui = $_POST["duiPaciente"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefonoPaciente"];
    $direccion = $_POST["direccionPaciente"];

    // Validar que el DUI sea único
    $query = "SELECT COUNT(*) AS total FROM pacientes WHERE duiPaciente = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $dui);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['total'] > 0) {
        echo "El DUI ya está registrado para otro paciente.";
    } else {
        // Insertar el nuevo paciente si el DUI es único
        $query = "INSERT INTO pacientes (nombrePaciente, apellidoPaciente, fecha_nacimiento, duiPaciente, genero, telefonoPaciente, direccionPaciente) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssss", $nombre, $apellido, $fechaNacimiento, $dui, $genero, $telefono, $direccion);

        if ($stmt->execute()) {
            echo "Paciente registrado exitosamente.";
        } else {
            echo "Error al registrar el paciente.";
        }
    }
    
    $stmt->close();
    $conn->close();

    // Redirigir a la página principal
    header("Location: ../index.php");
    exit();

}
?>
