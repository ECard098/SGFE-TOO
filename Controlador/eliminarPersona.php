<?php

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql =$conexion->query("Delete from cliente where id_Cliente =$id"); 
    if ($sql==1) {
        echo '';
    }else{
        echo '';

    }

}

?>