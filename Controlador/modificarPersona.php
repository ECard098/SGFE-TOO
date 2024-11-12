<?php

if (!empty($_POST["btnRegistrar"])) {

    if (!empty(!empty($_POST["nombreC"]) and !empty($_POST["apellidoC"]) and !empty($_POST["correoC"]) and !empty($_POST["generoC"]) and !empty($_POST["fechaC"]) and !empty($_POST["telefonoC"]) and !empty($_POST["direccionC"]))) {

        $id = $_POST["id"];
        $nombre = $_POST["nombreC"];
        $apellido = $_POST["apellidoC"];
        $correo = $_POST["correoC"];
        $genero = $_POST["generoC"];
        $fecha = $_POST["fechaC"];
        $telefono = $_POST["telefonoC"];
        $direccion = $_POST["direccionC"];

        $sql = $conexion->query("update cliente set nombre='$nombre', apellido = '$apellido', genero = '$genero', fecha_Nacimiento = '$fecha', telefono ='$telefono', direccion ='$direccion', correo='$correo' where id_Cliente=$id");
        if ($sql==1) {
            echo '<div class="alert alert-success">Cliente modificado correctamente</div>';
            header("location: lista_cliente.php");
        } else {
            echo '<div class="alert alert-danger">Ocurrio un error</div>';
        }

    }else {
        echo "<div alert alert-danger>Campos vacios</div>";
    }

}
