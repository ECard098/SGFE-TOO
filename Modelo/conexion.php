<?php

$host = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "sgfe";

$conexion = new mysqli($host, $usuario, $contraseña, $bd);
$conexion->set_charset("utf8");

?>