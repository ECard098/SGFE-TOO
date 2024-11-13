<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query("DELETE FROM sala WHERE id_Sala = $id");

    if ($sql) {
        // Si la eliminación es exitosa, puedes redirigir a la lista de salas
        header("Location: ./lista_sala.php");
        exit;
    } else {
        // Si hay un error, puedes mostrar un mensaje o redirigir de nuevo
        echo "Error al eliminar la sala.";
    }
}
?>
