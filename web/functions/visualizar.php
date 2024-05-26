<?php
/**
 * Visualizar 
 *
 * Fitxer php que utilitzo per habilitar la funcionalitat de poder veure les dades dels meus jugadors de forma més detallada
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
<head>
    <title>Datos personales del jugador</title>
    <link rel="stylesheet" type="text/css" href="./css/estils.css">
</head>
<body>
    <?php
    /**
     * Obté l'identificador del jugador a actualitzar
     */
    $identificador = $_GET['id_jugador'];
    /**
     * Consulta les dades del jugador a visualitzar
     */
    $resultado = mysqli_query($enlace, "SELECT d.id_jugador,d.nombre, d.apellido1, d.apellido2, d.telefono, e.nombre_equipo,p.nom FROM ((dades_jugadors d 
    INNER JOIN pais p ON d.pais=p.id_pais)
    INNER JOIN equipo e ON d.equipo=e.id_equipo) ");    
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
        <td>Equipo</td><td><?php echo $registro['nombre_equipo']; ?></td>
    </tr>
    <tr>
        <td>Pais</td><td><?php echo $registro['nom']; ?></td>
    </tr>
    </table>
</body>
</html>