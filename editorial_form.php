<?php include("conexion.php"); ?>

<h2>Registrar Editorial</h2>
<form method="post">
    Nombre Editorial: <input type="text" name="nombre_editorial" required><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST['guardar'])) {
    $result = mysqli_query($conexion, "SELECT MAX(cod_edit) AS max_id FROM editorial");
    $row = mysqli_fetch_assoc($result);
    $nuevo_id = $row['max_id'] + 1;

    $nombre = $_POST['nombre_editorial'];

    $sql = "INSERT INTO editorial (cod_edit, nombre_editorial)
            VALUES ($nuevo_id, '$nombre')";

    if (mysqli_query($conexion, $sql)) {
        echo "✅ Editorial registrada con ID $nuevo_id";
    } else {
        echo "❌ Error: " . mysqli_error($conexion);
    }
}
?>
<a href="index.php">Volver al inicio</a>
