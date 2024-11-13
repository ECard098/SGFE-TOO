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
    <title>Lista de Salas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/CSS/styleRegistro.css">
    <script src="./JS/listaEliminar.js"></script>

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
                        <h2>Lista de Salas</h2>
                        <?php
                        include "../Modelo/conexion.php";
                        include "../Controlador/eliminarSala.php";
                        ?>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class=" btn btn-success" href="./registrar_sala.php" role="button">Registrar Sala</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Id Sala</th>
                                <th scope="col">Nombre Sala</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="p-1">
                            <?php
                            include "../Modelo/conexion.php";
                            $sql = $conexion->query("select * from sala");
                            while ($datos = $sql->fetch_Object()) { ?>
                                <tr>
                                    <th scope="row"><?= $datos->id_Sala ?></th>
                                    <td><?= $datos->nombreSala ?></td>
                                    <td><?= $datos->capacidad ?></td>
                                    <td><?= $datos->estadoSala ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="#"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="./lista_sala.php?id=<?= $datos->id_Sala ?>"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a class="btn btn-secondary" href="./principal.php" role="button">Volver al inicio</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>
</body>

</html>
