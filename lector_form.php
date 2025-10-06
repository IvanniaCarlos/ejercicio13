<?php include("conexion.php"); ?>

<h2>Registrar Lector</h2>
<form method="post">
    Nombre: <input type="text" name="nombre_lector" required><br>
    Teléfono: <input type="text" name="telefono"><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST['guardar'])) {
    // Generar ID manualmente
    $result = mysqli_query($conexion, "SELECT MAX(cod_lector) AS max_id FROM lector");
    $row = mysqli_fetch_assoc($result);
    $nuevo_id = $row['max_id'] + 1;

    $nombre = $_POST['nombre_lector'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO lector (cod_lector, nombre_lector, telefono)
            VALUES ($nuevo_id, '$nombre', '$telefono')";

    if (mysqli_query($conexion, $sql)) {
        echo "✅ Lector registrado con ID $nuevo_id";
    } else {
        echo "❌ Error: " . mysqli_error($conexion);
    }
}
?>
<a href="index.php">Volver al inicio</a>
