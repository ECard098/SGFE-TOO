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
    <title>Funeraria La Esperanza - Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
    <!-- Encabezado con logo y barra de navegación -->
    <header class="bg-dark text-white p-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3">
                    <a class="nav-link text-white" href="./principal.php">Funeraria La Esperanza</a>
                </h1>
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="./lista_cliente.php" class="nav-link text-white">Clientes</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Salas</a></li>
                        <li class="nav-item"><a href="./registrar_Reservacion.php" class="nav-link text-white">Reservas</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Pagos</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Reportes</a>
                        </li>
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

    <!-- Contenedor principal que mantendrá el contenido expandido -->
    <div class="container-flex">
        <!-- Sección principal del Dashboard -->
        <section id="dashboard" class="container my-4">
            <h2 class="mb-4">Dashboard - Funeraria La Esperanza</h2>
            <p>Bienvenido al sistema de gestión de la Funeraria La Esperanza. Desde esta plataforma puedes gestionar clientes, reservas de salas de velatorio, pagos y reportes.</p>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Reservas Activas</h5>
                            <p class="card-text display-4"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Salas desocupadas</h5>
                            <p class="card-text display-4"></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Clientes Registrados</h5>
                            <?php
                            include "../Modelo/conexion.php";
                            $sql = $conexion->query("select count(*) AS total_clientes from cliente;");
                            if ($datos = $sql->fetch_object()) { ?>
                                <p class="card-text display-4"><?php echo $datos->total_clientes; ?></p>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Pagos Recientes</h5>
                            <p class="card-text display-4"></p>
                        </div>
                    </div>
                </div>            
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Reportes Generados</h5>
                            <p class="card-text display-4"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>Funeraria La Esperanza &copy; 2024 | Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>
</body>

</html>