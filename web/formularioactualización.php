<?php
/**
 * Pàgina de Formulari d'Actualització
 *
 * Aquest script PHP mostra un formulari per actualitzar les dades dels jugadors.
 * Connecta amb una base de dades MySQL i recupera les dades del jugador a actualitzar.
 * Permet actualitzar les dades del jugador i enviar-les a un script de gestió de la base de dades.
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
    <title>Formulario d'actualización</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <?php
    /**
     * Obté l'identificador del jugador a actualitzar
     */
    $identificador = $_GET['id_jugador'];
    /**
     * Consulta les dades del jugador a actualitzar
     */
    $resultado = mysqli_query($enlace, "SELECT * FROM dades_jugadors WHERE id_jugador=$identificador");
    $registro = mysqli_fetch_array($resultado);
    ?>
    <nav>
        <a href="./index.php">Volver a la página principal</a>
    </nav>
    <form id="formulario" method="post" action="./functions/editar.php?id_jugador=<?php echo $identificador ?>">
    <table border="1">
    <tr><td colspan="2">Formulario de actualización de datos</td></tr>
    <tr>
        <td>Nombre</td><td><input type="text" name="nom" value="<?php echo $registro['nombre']; ?>"/></td>
    </tr>
    <tr>
        <td>Apellido 1</td><td><input type="text" name="apellido1" value="<?php echo $registro['apellido1']; ?>" /></td>
    </tr>
    <tr>
        <td>Apellido 2</td><td><input type="text" name="apellido2" value="<?php echo $registro['apellido2']; ?>" /></td>
    </tr>
    <tr>
        <td>Telefono</td><td><input type="text" name="telefono" value="<?php echo $registro['telefono']; ?>" /></td>
    </tr>
    <tr>
        <td>Dirección</td><td><input type="text" name="direccion" value="<?php echo $registro['direccion']; ?>" /></td>
    </tr>
    <tr>
        <td colspan="2"><input id="actualizar" type="submit" value="Actualizar" /></td>
    </tr>
    </table>
    </form>

  <script>
    /**
     * Pregunta si l'usuari està segur d'enviar el formulari d'actualització
     */
    function pregunta() {
      if (confirm('¿Estas seguro de enviar este formulario de actualización?')) {
        document.getElementById('formulario').submit();
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('actualizar').addEventListener('click', function(e) {
        e.preventDefault();
        pregunta()
      });
    });
  </script>

</body>
</html>