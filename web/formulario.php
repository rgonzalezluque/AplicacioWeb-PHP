<!DOCTYPE html>
<html lang="es">
<head>
    <title>Formulari d'inscripció</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <nav>
        <a href="./index.php">Tornar a la pàgina principal</a>
    </nav>
    <form id="formulario" method="post" action="./functions/añadir.php">
    <table border="1">
    <tr><td colspan="2">Formulari d'inscripció al club</td></tr>
    <tr>
        <td>Nombre</td><td><input type="text" name="nom" /></td>
    </tr>
    <tr>
        <td>Apellido 1</td><td><input type="text" name="apellido1" /></td>
    </tr>
    <tr>
        <td>Apellido 2</td><td><input type="text" name="apellido2" /></td>
    </tr>
    <tr>
        <td>Telefono</td><td><input type="text" name="telefono" /></td>
    </tr>
    <tr>
        <td>Dirección</td><td><input type="text" name="direccion" /></td>
    </tr>
    <tr>
        <td colspan="2"><input id="enviar" type="submit" value="Enviar" /></td>
    </tr>
    </table>
    </form>

    <script>
    function pregunta() {
      if (confirm('¿Estas seguro de enviar este formulario de inscripción?')) {
        document.getElementById('formulario').submit();
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('enviar').addEventListener('click', function(e) {
        e.preventDefault();
        pregunta()
      });
    });
  </script>

</body>
</html>