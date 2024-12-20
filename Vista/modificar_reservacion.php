<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../index.php");
}
include "../Modelo/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("select * from reservaciones where id_Reservacion = $id");
$reservacion = $sql->fetch_object();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar reservacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/CSS/styleRegistro.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="icon" href="./IMG/ataud.ico" type="image/x-icon">

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
                        <li class="nav-item"><a href="./lista_reservacion.php" class="nav-link text-white">Reservas</a>
                        </li>
                        <li class="nav-item"><a href="./pagos.php" class="nav-link text-white">Pagos</a></li>
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

    <div class="container-fluid">

        <div class="row">

            <div div class="col-md-7 pt-5 pe-2">
                <div class="card p-3 m-2">
                    <div class="card-header">
                        <h2 class="text-center">Modificar Reservación</h2>
                        <?php
                        include "../Controlador/modificarReservacion.php";
                        ?>
                    </div>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Cliente:</label>
                            <select class="form-select" id="cbCliente" name="cbCliente" required>
                                <option value="" disabled>Seleccione al cliente</option>
                                <?php
                                $clientes = $conexion->query("SELECT id_Cliente, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM cliente");
                                while ($cliente = $clientes->fetch_object()) {
                                    $selected = ($cliente->id_Cliente == $reservacion->id_Cliente) ? "selected" : "";
                                    echo "<option value='$cliente->id_Cliente' $selected>$cliente->nombre_completo</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" id="clienteId" name="clienteId" value="<?= $reservacion->id_Cliente; ?>">


                        <div class="mb-2">
                            <label class="form-label">Fecha reservación: </label>
                            <?php
                            $fechaActual = date("Y-m-d");
                            ?>
                            <input type="date" class="form-control" name="fechaR" value="<?php echo $fechaActual; ?>" required>
                        </div>

                        <div class=" mb-2">
                            <label class="form-label">Fecha inicio</label>
                            <input type="date" class="form-control" name="fechaIniR" required>
                        </div>
                        <div class=" mb-2">
                            <label class="form-label">Fecha finalización</label>
                            <input type="date" class="form-control" name="fechaFinR" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sala:</label>
                            <select class="form-select" id="cbSala" name="sala" required onchange="updateHiddenInput('cbSala', 'salaId')">
                                <option value="" disabled>Seleccione la sala</option>
                                <?php
                                $salas = $conexion->query("SELECT id_Sala, nombreSala FROM sala");
                                while ($sala = $salas->fetch_object()) {
                                    $selected = ($sala->id_Sala == $reservacion->id_Sala) ? "selected" : "";
                                    echo "<option value='$sala->id_Sala' $selected>$sala->nombreSala</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Este input será visible para pruebas -->
                        <input type="hidden" id="salaId" name="salaId" value="<?= $reservacion->id_Sala ?>" />


                        <div class="mb-3">
                            <label class="form-label">Paquete:</label>
                            <select class="form-select" id="cbPaquete" name="cbPaquete" required onchange="updateHiddenInput('cbPaquete', 'planPaquete')">
                                <option value="" disabled>Seleccione el paquete</option>
                                <?php
                                $paquetes = $conexion->query("SELECT id_Paquete, tipoPaquete FROM paquete");
                                while ($paquete = $paquetes->fetch_object()) {
                                    $selected = ($paquete->id_Paquete == $reservacion->id_Paquete) ? "selected" : "";
                                    echo "<option value='$paquete->id_Paquete' $selected>$paquete->tipoPaquete</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Este input será visible para pruebas -->
                        <input type="hidden" id="planPaquete" name="planPaquete" value="<?= $reservacion->id_Paquete ?>" />


                        <div class="mb-3">
                            <label class="form-label">Plan de pago:</label>
                            <select class="form-select" id="cbPlan" name="cbPlan" required onchange="updateHiddenInput('cbPlan', 'planId')">
                                <option value="" disabled>Seleccione el plan</option>
                                <?php
                                $planes = $conexion->query("SELECT id_PlanPago, tipoPago FROM planpago");
                                while ($plan = $planes->fetch_object()) {
                                    $selected = ($plan->id_PlanPago == $reservacion->id_PlanPago) ? "selected" : "";
                                    echo "<option value='$plan->id_PlanPago' $selected>$plan->tipoPago</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Este input será visible para hacer pruebas -->
                        <input type="hidden" id="planId" name="planId" value="<?= $reservacion->id_PlanPago; ?>" />




                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success" value="ok"
                                name="btnModificarReservacion">Modificar reservación</button>
                            <a class="btn btn-dark" href="./lista_reservacion.php" role="button">Volver al listado</a>
                        </div>

                    </form>

                </div>

            </div>

            <div class="col-md-5 pt-5">
                <div class="card p-3 m-2">
                    <div class="card-header">

                        <h2>Lista de paquetes</h2>

                    </div>
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Paquete</th>
                            </tr>
                        </thead>
                        <tbody class="p-1 text-center">
                            <?php
                            include "../Modelo/conexion.php";
                            $sql = $conexion->query("select * from paquete");
                            while ($datos = $sql->fetch_Object()) { ?>
                                <tr>
                                    <th scope="row"><?= $datos->id_Paquete ?></th>
                                    <td><?= $datos->descripcion ?></td>
                                    <td>$ <?= $datos->precio ?></td>
                                    <td><?= $datos->tipoPaquete ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    <div>
                        <div class="card-header">
                            <h2>Lista de Planes Pago</h2>
                        </div>
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Tipo pago</th>
                                </tr>
                            </thead>
                            <tbody class="p-1 text-center">
                                <?php
                                include "../Modelo/conexion.php";
                                $sql = $conexion->query("select * from planpago");
                                while ($datos = $sql->fetch_Object()) { ?>
                                    <tr>
                                        <th scope="row"><?= $datos->id_PlanPago ?></th>
                                        <td><?= $datos->descripcion ?></td>
                                        <td><?= $datos->tipoPago ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <!-- Footer -->
    <footer>
        <p>Funeraria La Esperanza &copy; 2024 | Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>

    <script src="../Vista/JS/moReser.js"></script>
    <script src="../Vista/JS/script_reservacion.js"></script>
    <script src="../Vista/JS/ids.js"></script>
</body>

</html>