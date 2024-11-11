<?php
session_start();
if (!empty($_POST["btnIniciar"])) {
    if (!empty($_POST["txtUsuario"]) and !empty($_POST["txtPassword"])) {

        $usuario = $_POST["txtUsuario"];
        $password = $_POST["txtPassword"];

        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' AND contrasena='$password'");


        if ($datos = $sql->fetch_object()) {
            header("location: ./Vista/principal.php");
            $_SESSION["id"] = $datos->id_Cliente;
            $_SESSION["nombre"] = $datos->usuario;
            $_SESSION["correo"] = $datos->correo;
            $_SESSION["rol"] = $datos->rol;


        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
        

    } else {
       
    }
    
}

?>