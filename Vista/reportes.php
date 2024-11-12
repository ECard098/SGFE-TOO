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
    <title>Reportes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <script src="./JS/listaEliminar.js"></script>

    <link rel="stylesheet" href="./CSS/reporte.css">
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
                        <li class="nav-item"><a href="#" class="nav-link text-white">Salas</a></li>
                        <li class="nav-item"><a href="./registrar_Reservacion.php" class="nav-link text-white">Reservas</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Pagos</a></li>
                        <li class="nav-item"><a href="./reportes.php" class="nav-link text-white">Reportes</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Expediente</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    echo $_SESSION["nombre"] . " - " . $_SESSION["correo"];
                                    ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../Controlador/cerrarControler.php">Cerrar
                                            sesión</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <br>

    <div class="container-fluid">
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <form method="GET" action="">
                        <label for="fechaInicio">Filtrar fecha de reservación:</label>
                        <input type="date" name="fechaReservacion" id="fechaReservacion" required>
                        <button type="submit" class="btn btn-outline-success">Filtrar</button>

                    </form>
                </div>
                <div class="col">
                    <form method="GET" action="" style="display: inline-block;">
                        <button type="submit" class="btn btn-secondary">Quitar Filtro</button>
                    </form>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger" onclick="exportarPdf()" >Descargar PDF<img src="./IMG/file-earmark-arrow-down.svg" alt=""></button>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 p-5">
                <div class="card p-3 m-2">
                    <table id="reservaciones" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Número de reservación</th>
                                <th scope="col">Fecha de reservación</th>
                                <th scope="col">Fecha de inicio</th>
                                <th scope="col">Fecha de finalización</th>
                                <th scope="col">Número de Plan</th>
                                <th scope="col">Número de sala</th>
                                <th scope="col">Número de Cliente</th>
                                <th scope="col">Número de Paquete</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="p-1">
                            <?php

                            include "../Modelo/conexion.php";

                            // Verificar si se ha enviado una fecha de inicio en el formulario
                            $fechaReservacion = isset($_GET['fechaReservacion']) ? $_GET['fechaReservacion'] : null;



                            // Construir la consulta SQL según si hay un filtro de fecha
                            if ($fechaReservacion) {
                                $sql = $conexion->prepare("SELECT * FROM reservaciones WHERE fechaReservacion = ?");
                                $sql->bind_param("s", $fechaReservacion);
                            } else {
                                $sql = $conexion->prepare("SELECT * FROM reservaciones");
                            }

                            $sql->execute();
                            $result = $sql->get_result();

                            // Mostrar los datos de las reservaciones
                            while ($datos = $result->fetch_object()) { ?>
                                <tr>
                                    <td scope="row"><?= $datos->idReservacion ?></td>
                                    <td><?= $datos->fechaReservacion ?></td>
                                    <td><?= $datos->fechaInicio ?></td>
                                    <td><?= $datos->fechaFin ?></td>
                                    <td><?= $datos->idPlanPago ?></td>
                                    <td><?= $datos->idSala ?></td>
                                    <td><?= $datos->idCliente ?></td>
                                    <td><?= $datos->idPaquete ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="#"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="#"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                            $sql->close();
                            ?>
                        </tbody>
                    </table>

                </div>




            </div>


        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="./JS/generar_reporte.js"></script>

</body>

</html>