<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./Vista/CSS/login.css">
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
    <main class="form-container text-center">
        <form method="POST">
            <img class="mb-4" src="./Vista/IMG/user.png" alt="User Icon" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Iniciar sesión - SGFE</h1>
            <?php
            include "./Modelo/conexion.php";
            include "./Controlador/loginControler.php"

            ?>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="txtUsuario" placeholder="Digite usuario" required>
                <label><i class="fa-solid fa-user"></i> Usuario</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="txtPassword" placeholder="Password" required>
                <label><i class="fa-solid fa-lock"></i> Contraseña</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit" value="iniciarSesion" name="btnIniciar">Iniciar sesión</button>
            <p class="mt-5 mb-3 text-muted">Funeraria La Esperanza &copy; 2024 | Todos los derechos reservados</p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/80d40214cc.js" crossorigin="anonymous"></script>
</body>

</html>
