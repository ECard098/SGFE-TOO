<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Pacientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registro de Paciente</h2>
        <form action="../controladores/paciente.php" method="POST" class="border p-4 shadow-sm">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombrePaciente" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellidoPaciente" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="form-group">
                <label for="dui">DUI:</label>
                <input type="text" class="form-control" id="dui" name="duiPaciente" required maxlength="9">
            </div>

            <div class="form-group">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="O">Otro</option>

                </select>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefonoPaciente" maxlength="8">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <textarea class="form-control" id="direccion" name="direccionPaciente" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Registrar Paciente</button>
            <button type="button" class="btn btn-secondary" onclick="volverAlIndex()">Volver al Índice</button>
            </div>
        </form>
    </div>

    <script>
        function volverAlIndex() {
            window.location.href = "../index.php"; // Cambia esta URL según la ubicación de tu archivo index
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
