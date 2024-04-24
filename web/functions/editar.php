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
    <title>Formulario de actualización de datos</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <?php
    $identificador = $_GET['id_jugador'];
    $consulta_actualizacion = "UPDATE dades_jugadors SET nombre = '" . $_POST['nom'] . "', apellido1 = '" . $_POST['apellido1'] . "',
                                                        apellido2 = '" . $_POST['apellido2'] . "',
                                                        telefono = '" . $_POST['telefono'] . "',
                                                        direccion = '"  . $_POST['direccion'] . "'
                                                        WHERE id_jugador = $identificador;";
    if (!mysqli_query($enlace,$consulta_actualizacion)) {
        ?>
        Error en la actualización!!!
        <?php
    } else {
        ?>
        Actualización realizada correctamente!!! <a href="../index.php">Volver a la página principal</a>
        <?php
    }
    ?>
</body>
</html>