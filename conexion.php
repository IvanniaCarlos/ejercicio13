<?php
$conexion = mysqli_connect("localhost", "root", "", "ejercicio13.");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
