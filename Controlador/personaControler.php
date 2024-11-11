<?php

if (!empty($_POST["btnRegistrar"])) {
    if (!empty($_POST["nombreC"]) and !empty($_POST["apellidoC"]) and !empty($_POST["correoC"]) and !empty($_POST["generoC"]) and !empty($_POST["fechaC"]) and !empty($_POST["telefonoC"]) and !empty($_POST["direccionC"])) {
       
        $nombre = $_POST["nombreC"];
        $apellido = $_POST["apellidoC"];
        $correo = $_POST["correoC"];
        $genero = $_POST["generoC"];
        $fecha = $_POST["fechaC"];
        $telefono = $_POST["telefonoC"];
        $direccion = $_POST["direccionC"];
        
        $sql = $conexion->query("insert into cliente(nombre, apellido, genero, fecha_Nacimiento, telefono, direccion, correo) value('$nombre','$apellido','$genero','$fecha','$telefono','$direccion','$correo')");
        if ($sql==1) {
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Ocurrio un error</div>';
        }
        

    }else{
        echo "Error";
    }
}
