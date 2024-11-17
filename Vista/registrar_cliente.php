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
    <title>Registro cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/CSS/footer.css">
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
                        <li class="nav-item"><a href="../Vista/lista_cliente.php" class="nav-link text-white">Clientes</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Salas</a></li>
                        <li class="nav-item"><a href="./lista_reservacion.php" class="nav-link text-white">Reservas</a></li>
                        <li class="nav-item"><a href="./pagos.php" class="nav-link text-white">Pagos</a></li>
                        <li class="nav-item"><a href="./reportes.php" class="nav-link text-white">Reportes</a></li>
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
                        <h2 class="text-center">Registro cliente</h2>
                        <?php
                        include "../Modelo/conexion.php";
                        include "../Controlador/personaControler.php";                       
                        ?>
                    </div>
                    <form class="m-3 p-3" method="POST" action="">
                        <div class="mb-2">
                            <label class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombreC" placeholder="Ingresa nombre cliente" required maxlength="50">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Apellido: </label>
                            <input type="text" class="form-control" name="apellidoC" placeholder="Ingresa apellido cliente" required maxlength="50">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Correo: </label>
                            <input type="email" class="form-control" name="correoC" placeholder="Ingresa correo cliente" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Genero: </label>
                            <select class="form-select" name="generoC" aria-label="Eliga una opción">
                                <option selected>Seleccione opción</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Fecha Nacimiento: </label>
                            <input type="date" class="form-control" name="fechaC" placeholder="Ingresa apellido cliente" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Telefono: </label>
                            <input type="text" class="form-control" name="telefonoC" placeholder="Ingresa telefono cliente" required maxlength="8">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Dirección: </label>
                            <input type="text" class="form-control" name="direccionC" placeholder="Ingresa dirección cliente" required>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success" value="ok" name="btnRegistrar">Crear cliente</button>
                            <a class="btn btn-dark" href="./lista_cliente.php" role="button">Volver al listado</a>
                        </div>

                    </form>
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