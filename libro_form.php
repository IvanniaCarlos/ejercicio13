<?php include("conexion.php"); ?>

<h2>Registrar Libro</h2>
<form method="post">
    Título: <input type="text" name="titulo" required><br>
    Autor: <input type="text" name="autor" required><br>
    N° Copia: <input type="number" name="nro_copia" required><br>
    Cod. Editorial: <input type="number" name="cod_edit" required><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST['guardar'])) {
    $result = mysqli_query($conexion, "SELECT MAX(cod_libro) AS max_id FROM libro");
    $row = mysqli_fetch_assoc($result);
    $nuevo_id = $row['max_id'] + 1;

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $nro_copia = $_POST['nro_copia'];
    $cod_edit = $_POST['cod_edit'];

    $sql = "INSERT INTO libro (cod_libro, titulo, autor, nro_copia, cod_edit)
            VALUES ($nuevo_id, '$titulo', '$autor', $nro_copia, $cod_edit)";

    if (mysqli_query($conexion, $sql)) {
        echo "✅ Libro registrado con ID $nuevo_id";
    } else {
        echo "❌ Error: " . mysqli_error($conexion);
    }
}
?>
<a href="index.php">Volver al inicio</a>
