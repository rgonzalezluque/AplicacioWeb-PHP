<?php
/**
 * Editar
 * 
 * Fitxer php que utilitzo per editar els registres que els usuaris indiquen al formulari
 *
 */

/**
 * Connecta amb la base de dades MySQL
 *
 */
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
    /**
     * Obté l'identificador del jugador a editar
     */
    $identificador = $_GET['id_jugador'];
    /**
     * Fa un update al jugador per canviar les dades antigues per les noves que ha especificat l'usuari
     */
    $consulta_actualizacion = "UPDATE dades_jugadors SET nombre = '" . $_POST['nom'] . "', 
                                                        apellido1 = '" . $_POST['apellido1'] . "',
                                                        apellido2 = '" . $_POST['apellido2'] . "',
                                                        telefono = '" . $_POST['telefono'] . "',
                                                        direccion = '"  . $_POST['direccion'] . "',
                                                        pais = '" . $_POST['pais'] . "',
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