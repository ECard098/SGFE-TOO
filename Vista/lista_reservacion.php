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
    <title>Lista Reservaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/CSS/styleRegistro.css">
    <script src="./JS/listaEliminar.js"></script>
    <link rel="stylesheet" href="./CSS/footer.css">
</head>

<body class="body-registro">
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
                        <li class="nav-item"><a href="./lista_sala.php" class="nav-link text-white">Salas</a></li>
                        <li class="nav-item"><a href="./lista_reservacion.php" class="nav-link text-white">Reservas</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Pagos</a></li>
                        <li class="nav-item"><a href="./reportes.php" class="nav-link text-white">Reportes</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Expediente</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    echo $_SESSION["nombre"] . " - " . $_SESSION["correo"];
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

        <div class="row">

            <div class="col-md-12 p-5">
                <div class="card p-3 m-2">
                    <div class="card-header">
                        <h2>Lista de reservaciones </h2>
                        <?php
                        include "../Modelo/conexion.php";
                        ?>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class=" btn btn-success" href="./registrar_Reservacion.php" role="button">Crear reservación</a>
                        </div>
                    </div>
                    <div style="max-height: 500px; overflow-y: auto;">
                    <table class="table">
                        <thead class="text-left">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Fecha reservacion</th>
                                <th scope="col">Fecha inicio</th>
                                <th scope="col">Fecha fin</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Paquete</th>
                                <th scope="col">Sala</th>
                                <th scope="col">Plan pago</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="p-1">
                            <?php
                            include "../Modelo/conexion.php";
                            $sql = $conexion->query("select * from reservaciones");
                            while ($datos = $sql->fetch_Object()) { ?>
                                <tr>
                                    <th scope="row"><?= $datos->idReservacion ?></th>
                                    <td><?= $datos->fechaReservacion ?></td>
                                    <td><?= $datos->fechaInicio ?></td>
                                    <td><?= $datos->fechaFin ?></td>
                                    <td><?= $datos->idCliente ?></td>
                                    <td><?= $datos->idPaquete ?></td>
                                    <td><?= $datos->idSala ?></td>
                                    <td><?= $datos->idPlanPago ?></td>
                                    
                                    <td>
                                        <a class="btn btn-warning" href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="#"><i class="fa-solid fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a class=" btn btn-dark" href="./principal.php" role="button">Volver al inicio</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
<footer>
        <p>Funeraria La Esperanza &copy; 2024 | Todos los derechos reservados</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>
</body>

</html>