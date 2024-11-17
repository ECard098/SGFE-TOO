<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Sala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/CSS/styleRegistro.css">
    
</head>

<body class="body-registro">

    <!-- Encabezado con logo y barra de navegación -->
    <header class="bg-dark text-white p-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3">
                    <a class="nav-link text-white" href="../index.php">Funeraria La Esperanza</a>
                </h1>
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="../Vista/lista_cliente.php" class="nav-link text-white">Clientes</a></li>
                        <li class="nav-item"><a href="./lista_sala.php" class="nav-link text-white">Salas</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Reservas</a></li>
                        <li class="nav-item"><a href="./pagos.php" class="nav-link text-white">Pagos</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Reportes</a></li>
                         <li class="nav-item"><a href="#" class="nav-link text-white">Expediente</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    echo $_SESSION["nombre"] . " - ". $_SESSION["correo"];
                                    ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../Controlador/cerrarControler.php">Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container-fluid">
            <div class="col-md-12 p-5">
                <div class="card p-3 m-2">
                    <div class="card-header">
                        <h2 class="text-left">Registro Sala</h2>
                        <?php
                        include "../Modelo/conexion.php";
                        include "../Controlador/salaControler.php"; // Incluir el controlador de sala que manejará la inserción
                        ?>
                    </div>
                    <form class="m-3 p-3" method="POST" action="">
                        <!-- Campo para idReservacion -->                        
                        <div class="mb-2">
                            <label class="form-label">Nombre de la Sala: </label>
                            <input type="text" class="form-control" name="nombreSala" placeholder="Ingresa nombre de la sala" required maxlength="100">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Capacidad: </label>
                            <input type="number" class="form-control" name="capacidad" placeholder="Ingresa capacidad de la sala" required min="1">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Estado de la Sala: </label>
                            <select class="form-select" name="estadoSala" aria-label="Elige estado de la sala">
                                <option selected>Seleccione opción</option>
                                <option value="disponible">Disponible</option>
                                <option value="Ocupada">Ocupada</option>
                                <option value="mantenimiento">En mantenimiento</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary" value="ok" name="btnRegistrarSala">Registrar Sala</button>
                            <a class="btn btn-secondary" href="./lista_sala.php" role="button">Volver al listado</a>
                        </div>

                    </form>
                </div>
            </div>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>
</body>

</html>
