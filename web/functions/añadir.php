<?php
/**
 * Añadir
 * 
 * Fitxer php que utilitzo per afegir nous registres a partir de les dades que els usuaris indiquen al formulari
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

/**
 * Obté les dades del nou jugador des del formulari d'inscripció
 */
$nom = $_POST['nom'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

/**
 * Fa un insert a la nova base de dades que crea un nou registre amb les dades que especifica l'usuari
 */

$inscripcióSQL = "INSERT INTO dades_jugadors VALUES (NULL, '$nom', '$apellido1', '$apellido2', '$telefono', '$direccion')";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Resultat Inscripció</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <nav>
        <a href="../index.php">Tornar a la pàgina principal</a>
    </nav>
    <?php
    $resultado = mysqli_query($enlace, $inscripcióSQL);
    if (!$resultado) {
        echo "ERROR: Inserció de dades realitzada INCORRECTAMENT!! ";
    } else {
        echo "Inserció de dades realitzada CORRECTAMENT!! ";
    }
    ?>
</body>
</html>