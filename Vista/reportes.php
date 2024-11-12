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
    <link rel="stylesheet" href="./CSS/reporte.css">
    <link rel="stylesheet" href="./CSS/footer.css">
</head>

<body >
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
                        <li class="nav-item"><a href="./registrar_Reservacion.php"
                                class="nav-link text-white">Reservas</a></li>
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
        <div style="margin-left: 2%;" class="container-fluid">
            <div class="row align-items-left">
                <div class="col">
                    <form method="GET" action="">
                        <label for="fechaReservacion">Fecha de Reservación:</label>
                        <input type="date" name="fechaReservacion" id="fechaReservacion">

                        <label for="numPlanPago">Plan de Pago:</label>
                        <input type="number" name="numPlanPago" id="numPlanPago" placeholder="Número de Plan">

                        <button type="submit" class="btn btn-dark">Filtrar</button>
                    </form>
                </div>
                <div class="col">
                    <form method="GET" action="" style="display: inline-block;">
                        <button type="submit" class="btn btn-dark">Quitar Filtro</button>
                    </form>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-5">
                <div class="card p-3 m-2">
                <div style="max-height: 600px; overflow-y: auto;">
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

                            // Obtener los valores de los filtros
                            $fechaReservacion = isset($_GET['fechaReservacion']) ? $_GET['fechaReservacion'] : null;
                            $numPlanPago = isset($_GET['numPlanPago']) ? $_GET['numPlanPago'] : null;

                            // Construir la consulta según los filtros
                            $query = "SELECT * FROM reservaciones WHERE 1=1"; // La condición `1=1` permite añadir filtros con `AND`
                            $params = [];
                            $types = "";

                            // Aplicar el filtro de fecha de reservación si se ha proporcionado
                            if ($fechaReservacion) {
                                $query .= " AND fechaReservacion = ?";
                                $params[] = $fechaReservacion;
                                $types .= "s"; // Tipo de dato string para fecha
                            }

                            // Aplicar el filtro de número de plan de pago si se ha proporcionado
                            if ($numPlanPago) {
                                $query .= " AND idPlanPago = ?";
                                $params[] = $numPlanPago;
                                $types .= "i"; // Tipo de dato integer para número de plan de pago
                            }

                            // Preparar la consulta
                            $stmt = $conexion->prepare($query);
                            if ($params) {
                                $stmt->bind_param($types, ...$params);
                            }
                            $stmt->execute();
                            $result = $stmt->get_result();


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
                            $stmt->close();
                            ?>
                        </tbody>
                    </table>
                    </div>




                </div>
                <button style="float: right;" type="button" class="btn btn-danger" onclick="exportarPdf()">Descargar reporte en
                    PDF<img src="./IMG/file-earmark-arrow-down.svg" alt=""></button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <p>Funeraria La Esperanza &copy; 2024 | Todos los derechos reservados</p>
    </footer>
    <script src="./JS/generar_reporte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
</body>

</html>