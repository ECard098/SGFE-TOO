<?php

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql =$conexion->query("Delete from cliente where id_Cliente =$id"); 
    if ($sql==1) {
        echo '<div class="alert alert-success">Cliente eliminado correctamente</div>';
    }else{
        '<div class="alert alert-danger">Cliente NO se pudo eliminar...</div>';

    }

}

?>