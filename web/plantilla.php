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
    <h1>Plantilla del equipo</h1>
    <table id="table" border="1">
    <tr><td>Nombre</td><td>Apellido 1</td><td>Apellido 2</td><td>Telefono</td><td>Equipo</td><td>País</td><td>Acció</td></tr>
    <?php
    /**
     * Consulta dades dels jugadors i mostra una taula
     */
$resultado = mysqli_query($enlace, "SELECT d.id_jugador,d.nombre, d.apellido1, d.apellido2, d.telefono, p.nom, e.nombre_equipo 
                            FROM ((dades_jugadors d 
                            INNER JOIN pais p ON d.pais=p.id_pais)
                            INNER JOIN equipo e ON d.equipo = e.id_equipo) ");
    while ( $registro = mysqli_fetch_array($resultado) ) {
        echo "<tr>";
        echo "<td>" . $registro['nombre'] . "</td>";
        echo "<td>" . $registro['apellido1'] . "</td>";
        echo "<td>" . $registro['apellido2'] . "</td>";
        echo "<td>" . $registro['telefono'] . "</td>";
        echo "<td>" . $registro['nombre_equipo'] . "</td>";
        echo "<td>" . $registro['nom'] . "</td>";
        $linkactualización = "formularioactualización.php?id_jugador=" . $registro['id_jugador'];
        $linkeliminación = "./functions/eliminar.php?id_jugador=" . $registro['id_jugador'];
        $linkvisualizar = "./functions/visualizar.php?id_jugador=" . $registro['id_jugador'];
        echo "<td><a href=\"$linkactualización\">Actualizar</a> / <a href=\"$linkeliminación\" onclick=\"return confirmarEliminacion()\" >Eliminar</a> / <a href=\"$linkvisualizar\">Datos personales</a></td>";
        echo "</tr>";
    }
    ?>
    </table>

    <footer>
        <a href="./formulario.php" class="btn">Añadir nuevos registros<a/>
        <a href="./index.php" class="btn">Iniciar sesión<a/>
        <a href="./functions/cerrar_sesion.php" class="btn">Cerrar sesión<a/>
    </footer>

</body>
</html>