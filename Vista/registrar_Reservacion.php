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
    <title>Lista de paquetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/CSS/styleRegistro.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


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
                        <li class="nav-item"><a href="#" class="nav-link text-white">Reservas</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Pagos</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Reportes</a></li>
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

            <div div class="col-md-7 pt-5 pe-2">
                <div class="card p-3 m-2">
                    <div class="card-header">
                        <h2 class="text-center">Reservaciones</h2>
                        <?php
                        include "../Modelo/conexion.php";
                        ?>
                    </div>
                    <form class="m-2 p-2" method="POST" action="">
                        <div class="mb-2">
                            <label class="form-label">Cliente: </label>
                            <select class="form-select" name="cbCliente" required>
                                <option selected>Seleccione al cliente</option>
                                <?php
                                include "./Modelo/conexion.php";
                                $sql = $conexion->query("SELECT id_Cliente, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM cliente");
                                while ($datos = $sql->fetch_object()) {
                                    echo "<option value='" . $datos->id_Cliente . "'>" . $datos->nombre_completo . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class=" mb-2">
                            <label class="form-label">Fecha reservación: </label>
                            <input type="date" class="form-control" name="fechaR" required>
                        </div>

                        <div class=" mb-2">
                            <label class="form-label">Hora reservación: </label>
                            <input type="time" class="form-control" name="horaR" required>
                        </div>

                        <div class=" mb-2">
                            <label class="form-label">Fecha finalizacion: </label>
                            <input type="date" class="form-control" name="fechaFinR" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Sala: </label>
                            <select class="form-select" name="cbSala">
                                <option selected>Seleccione sala</option>
                                <option value="---">---</option>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Paquete: </label>
                            <select class="form-select" name="cbPaquete" required>
                                <option selected>Seleccione el paquete</option>
                                <?php
                                include "./Modelo/conexion.php";
                                $sql = $conexion->query("SELECT id_Paquete, tipoPaquete FROM paquete");
                                while ($datos = $sql->fetch_object()) {
                                    echo "<option value='" . $datos->id_Paquete . "'>" . $datos->tipoPaquete . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary" value="ok" name="btnRegistrarReservacion">Crear reservación</button>
                            <a class="btn btn-secondary" href="./principal.php" role="button">Volver al inicio</a>
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

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $('select[name="cbCliente"]').select2({
                placeholder: "Seleccione un cliente",
                allowClear: true
            });
            $('select[name="cbSala"]').select2({
                placeholder: "Seleccione una sala",
                allowClear: true
            });
        });
    </script>
</body>

</html>