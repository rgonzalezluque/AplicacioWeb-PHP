<?php
$enlace = mysqli_connect("database:3306", "root", "tiger", "jugadors");

if (!$enlace) {
    echo "Error a la conexión;: " .mysqli_connect_error();
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Plantilla del equipo</title>
    <script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este registro?");
        }
    </script>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <h1>Plantilla del equipo</h1>
    <table id="table" border="1">
    <tr><td>Nombre</td><td>Apellido 1</td><td>apellido 2</td><td>Acció</td></tr>
    <?php
    $resultado = mysqli_query($enlace, "SELECT * FROM dades_jugadors");
    while ( $registro = mysqli_fetch_array($resultado) ) {
        echo "<tr>";
        echo "<td>" . $registro['nombre'] . "</td>";
        echo "<td>" . $registro['apellido1'] . "</td>";
        echo "<td>" . $registro['apellido2'] . "</td>";
        $linkactualización = "formularioactualización.php?id_jugador=" . $registro['id_jugador'];
        $linkeliminación = "./functions/eliminar.php?id_jugador=" . $registro['id_jugador'];
        $linkvisualizar = "./functions/visualizar.php?id_jugador=" . $registro['id_jugador'];
        echo "<td><a href=\"$linkactualización\">Actualizar</a> / <a href=\"$linkeliminación\" onclick=\"return confirmarEliminacion()\" >Eliminar</a> / <a href=\"$linkvisualizar\">Datos personales</a></td>";
        echo "</tr>";
    }
    ?>
    </table>

    <footer>
        <a href="./formulario.php">Añadir nuevos registros<a/>
    </footer>

</body>
</html>