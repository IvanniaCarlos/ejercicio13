<?php include("conexion.php"); ?>

<h2>Registrar Detalle de Préstamo</h2>
<form method="post">
    N° de Préstamo: <input type="number" name="nro_de_prestamo" required><br>
    Código de Libro: <input type="number" name="cod_libro" required><br>
    Cantidad Prestada: <input type="number" name="cantidad_prestada" required><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST['guardar'])) {
    $nro = $_POST['nro_de_prestamo'];
    $libro = $_POST['cod_libro'];
    $cant = $_POST['cantidad_prestada'];

    $sql = "INSERT INTO detalle_prestamo (nro_de_prestamo, cod_libro, cantidad_prestada)
            VALUES ($nro, $libro, $cant)";

    if (mysqli_query($conexion, $sql)) {
        echo "✅ Detalle registrado correctamente";
    } else {
        echo "❌ Error: " . mysqli_error($conexion);
    }
}
?>
<a href="index.php">Volver al inicio</a>
