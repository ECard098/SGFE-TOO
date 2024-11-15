<?php

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql =$conexion->query("Delete from reservaciones where id_Reservacion =$id"); 
    if ($sql==1) {
        echo  '<div class="alert alert-success">Reservacion eliminada correctamente</div>';
    }else{
        '<div class="alert alert-success">Reservacion NO se pudo eliminar</div>';

    }

}

?>