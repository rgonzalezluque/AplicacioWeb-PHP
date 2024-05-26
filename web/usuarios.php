<?php

/**
 * Pàgina principal de la web
 *
 * Aquest script PHP mostra una plantilla d'equip amb informació dels jugadors.
 * Connecta amb una base de dades MySQL i recupera les dades dels jugadors.
 * Proporciona opcions per actualitzar, eliminar i visualitzar les dades dels jugadors.
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
    <title>Plantilla del equipo</title>
    <script>
        /**
         * Funció per confirmar l'eliminació d'un registre
         *
         * @return boolean Retorna true si l'usuari confirma, fals si cancel·la
         */
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este registro?");
        }
    </script>



    <link rel="stylesheet" type="text/css" href="./css/estils.css">
</head>
<body>
    <h1>Usuarios</h1>
    <table id="table" border="1">
    <tr><td>Nombre</td><td>Email</td></tr>
    <?php
    /**
     * Consulta dades dels jugadors i mostra una taula
     */
$resultado = mysqli_query($enlace, "SELECT id,nom, email FROM usuaris ");
    while ( $registro = mysqli_fetch_array($resultado) ) {
        echo "<tr>";
        echo "<td>" . $registro['nom'] . "</td>";
        echo "<td>" . $registro['email'] . "</td>";
        echo "</tr>";
    }
    ?>
    </table>

    <footer>
        <a href="./formulariousuarios.php" class="btn">Añadir nuevo usuario<a/>
        <a href="./plantilla.php" class="btn">Ver la plantilla del club<a/>
    </footer>

</body>
</html>