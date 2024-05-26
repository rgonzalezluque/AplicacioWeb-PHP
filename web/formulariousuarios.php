<!DOCTYPE html>
<html lang="es">
<head>
    <title>Formulari d'inscripció d'usuari</title>
    <link rel="stylesheet" type="text/css" href="./css/estils.css">
</head>
<body>
    <nav>
        <a href="./plantilla.php">Tornar a la pàgina principal</a>
    </nav>
    <form id="formulario" method="post" action="./functions/añadir_usuarios.php">
    <table border="1">
    <tr><td colspan="2">Formulari d'inscripció d'usuario</td></tr>
    <tr>
        <td>Nombre</td><td><input type="text" name="nom" /></td>
    </tr>
    <tr>
        <td>Email</td><td><input type="text" name="email" /></td>
    </tr>
    <tr>
        <td>Contraseña</td><td><input type="text" name="contraseña" /></td>
    </tr>
    <tr>
        <td colspan="2"><input id="enviar" type="submit" value="Enviar" /></td>
    </tr>
    </table>
    </form>

    <script>
    function pregunta() {
      if (confirm('¿Estas seguro de enviar este formulario de inscripción de usuario?')) {
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