<?php
if (!empty($_POST['btnModificarSala'])) {

    if (!empty(!empty($_POST["nombreSala"]) and !empty($_POST["capacidad"]) and !empty($_POST["estadoSala"]))) {

        $id = $_POST['id'];
        $nombreSala = $_POST['nombreSala'];
        $capacidad = $_POST['capacidad'];
        $estadoSala = $_POST['estadoSala'];

        $sql = $conexion->query("update sala set nombreSala='$nombreSala', capacidad='$capacidad', estadoSala='$estadoSala'  where id_Sala=$id");
        if ($sql==1) {
            echo '<div class="alert alert-success">Sala modificada correctamente</div>';
            header("location: lista_sala.php");
        } else {
            echo '<div class="alert alert-danger">Campos vacios</div>';
        }
    }
}
