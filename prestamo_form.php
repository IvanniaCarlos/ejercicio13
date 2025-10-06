<?php include("conexion.php"); ?>

<h2>Registrar Préstamo</h2>
<form method="post">
    Código del Lector: <input type="number" name="cod_lector" required><br>
    Fecha de Préstamo: <input type="date" name="fecha_de_prestamo" required><br>
    Cantidad de Libros: <input type="number" name="cantidad_libros" required><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST['guardar'])) {
    $result = mysqli_query($conexion, "SELECT MAX(nro_de_prestamo) AS max_id FROM prestamo");
    $row = mysqli_fetch_assoc($result);
    $nuevo_id = $row['max_id'] + 1;

    $cod_lector = $_POST['cod_lector'];
    $fecha = $_POST['fecha_de_prestamo'];
    $cantidad = $_POST['cantidad_libros'];

    $sql = "INSERT INTO prestamo (nro_de_prestamo, cod_lector, fecha_de_prestamo, cantidad_libros)
            VALUES ($nuevo_id, $cod_lector, '$fecha', $cantidad)";

    if (mysqli_query($conexion, $sql)) {
        echo "✅ Préstamo registrado con ID $nuevo_id";
    } else {
        echo "❌ Error: " . mysqli_error($conexion);
    }
}
?>
<a href="index.php">Volver al inicio</a>
