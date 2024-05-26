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
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];


$inscripcióSQLDades = "INSERT INTO usuaris 
                        VALUES (NULL, '$nom', '$email', '$contraseña')";


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Resultat Inscripció</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <nav>
        <a href="../plantilla.php">Anar a la plantilla del club</a>
    </nav>
    <?php
    $resultado = mysqli_query($enlace, $inscripcióSQLDades);
    if (!$resultado) {
        echo "ERROR: Inserció de dades realitzada INCORRECTAMENT!! ";
    } else {
        echo "Inserció de dades realitzada CORRECTAMENT!! ";
    }
    ?>
</body>
</html>