<?php
include("conexion.php");

$sql = "SELECT p.nro_de_prestamo, p.fecha_de_prestamo, l.nombre_lector,
        d.cod_libro, b.titulo, d.cantidad_prestada
        FROM prestamo p
        JOIN lector l ON p.cod_lector = l.cod_lector
        JOIN detalle_prestamo d ON p.nro_de_prestamo = d.nro_de_prestamo
        JOIN libro b ON d.cod_libro = b.cod_libro
        ORDER BY p.nro_de_prestamo";

$result = mysqli_query($conexion, $sql);
?>

<h2>Reporte de Préstamos</h2>
<table border="1" cellpadding="5">
<tr>
    <th>N° Préstamo</th>
    <th>Fecha</th>
    <th>Lector</th>
    <th>Código Libro</th>
    <th>Título</th>
    <th>Cantidad</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['nro_de_prestamo'] ?></td>
    <td><?= $row['fecha_de_prestamo'] ?></td>
    <td><?= $row['nombre_lector'] ?></td>
    <td><?= $row['cod_libro'] ?></td>
    <td><?= $row['titulo'] ?></td>
    <td><?= $row['cantidad_prestada'] ?></td>
</tr>
<?php } ?>
</table>

<a href="index.php">Volver al inicio</a>
