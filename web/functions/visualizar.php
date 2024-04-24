<?php
$enlace = mysqli_connect("database:3306", "root", "tiger", "jugadors");

if (!$enlace) {
    echo "Error a la conexión;: " .mysqli_connect_error();
    exit;
}

?>
<!DOCTYPE html>
<head>
    <title>Datos personales del jugador</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <?php
    $identificador = $_GET['id_jugador'];
    $resultado = mysqli_query($enlace, "SELECT * FROM dades_jugadors WHERE id_jugador=$identificador");
    $registro = mysqli_fetch_array($resultado);
    ?>
    <nav>
        <a href="../index.php">Volver a la página principal</a>
    </nav>
    <table border="1">
    <tr><td colspan="2">Datos personales del jugador <?php echo $registro['id_jugador']; ?></td></tr>
    <tr>
        <td>Nombre</td><td><?php echo $registro['nombre']; ?></td>
    </tr>
    <tr>
        <td>Apellido 1</td><td><?php echo $registro['apellido1']; ?></td>
    </tr>
    <tr>
        <td>Apellido 2</td><td><?php echo $registro['apellido2']; ?></td>
    </tr>
    <tr>
        <td>Telefono</td><td><?php echo $registro['telefono']; ?></td>
    </tr>
    <tr>
        <td>Dirección</td><td><?php echo $registro['direccion']; ?></td>
    </tr>
    </table>
</body>
</html>