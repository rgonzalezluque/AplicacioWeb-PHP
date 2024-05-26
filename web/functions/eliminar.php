<?php
/**
 * Eliminar
 *
 * Fitxer php que utilitzo per eliminar els registres que els usuaris indiquen al formulari
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
    <title>Formulario de eliminación de datos</title>
    <link rel="stylesheet" type="text/css" href="./css/estils.css">
</head>
<body>
    <?php
    /**
     * Obté l'identificador del jugador a eliminar
     */
    $identificador = $_GET['id_jugador'];
    /**
     * Inyecta el codi d'eliminació del jugador a la base de dades del web
     */
    $consulta_eliminacion = "DELETE FROM dades_jugadors WHERE id_jugador=$identificador";
    if (!mysqli_query($enlace,$consulta_eliminacion)) {
        ?>
        Error en la eliminación!!!
        <?php
    } else {
        ?>
        Eliminación realizada correctamente!!! <a href="../index.php">Volver a la página principal</a>
        <?php
    }
    ?>

</body>
</html>