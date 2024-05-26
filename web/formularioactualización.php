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
    <link rel="stylesheet" type="text/css" href="./css/estils.css">
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
    $resultado = mysqli_query($enlace, "SELECT d.id_jugador,d.nombre, d.apellido1, d.apellido2, d.telefono, p.nom, e.nombre_equipo FROM ((dades_jugadors d 
                            INNER JOIN pais p ON d.pais=p.id_pais)
                            INNER JOIN equipo e ON d.equipo = e.id_equipo)
                            WHERE d.id_jugador = $identificador ");
      
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
        <td>Equipo</td>
        <td>
        <select name="equipo" id="equipo">
            <option value="1">Atlético de Madrid</option>
            <option value="2" selected>FC Barcelona</option>
            <option value="3">Real Betis</option>
            <option value="4">Celta de Vigo</option>
            <option value="5">Cádiz CF</option>
            <option value="6">Deportivo Alavés</option>
            <option value="7">Getafe CF</option>
            <option value="8">Girona FC</option>
            <option value="9">Granada CF</option>
            <option value="10">UD Las Palmas</option>
            <option value="11">RCD Mallorca</option>
            <option value="12">Osasuna</option>
            <option value="13">Rayo Vallecano</option>
            <option value="14">Real Madrid</option>
            <option value="15">Real Sociedad</option>
            <option value="16">Sevilla FC</option>
            <option value="17">Valencia CF</option>
            <option value="18">Villarreal CF</option>
            <option value="19">Deportivo Alavés</option>
            <option value="20">UD Almería</option>
            <option value="21">Athletic Club</option>
        </select>
      
      </td>
    </tr>
    <tr>
        <td>País</td>
        <td>
        <select name="pais">
          <option value=1>Afganistán</option>
          <option value=2>Albania</option>
          <option value=3>Alemania</option>
          <option value=4>Andorra</option>
          <option value=5>Angola</option>
          <option value=6>Anguilla</option>
          <option value=7>Antártida</option>
          <option value=8>Antigua y Barbuda</option>
          <option value=9>Antillas Holandesas</option>
          <option value=10>Arabia Saudí</option>
          <option value=11>Argelia</option>
          <option value=12>Argentina</option>
          <option value=13>Armenia</option>
          <option value=14>Aruba</option>
          <option value=15>Australia</option>
          <option value=16>Austria</option>
          <option value=17>Azerbaiyán</option>
          <option value=18>Bahamas</option>
          <option value=19>Bahrein</option>
          <option value=20>Bangladesh</option>
          <option value=21>Barbados</option>
          <option value=22>Bélgica</option>
          <option value=23>Belice</option>
          <option value=24>Benin</option>
          <option value=25>Bermudas</option>
          <option value=26>Bielorrusia</option>
          <option value=27>Birmania</option>
          <option value=28>Bolivia</option>
          <option value=29>Bosnia y Herzegovina</option>
          <option value=30>Botswana</option>
          <option value=31>Brasil</option>
          <option value=32>Brunei</option>
          <option value=33>Bulgaria</option>
          <option value=34>Burkina Faso</option>
          <option value=35>Burundi</option>
          <option value=36>Bután</option>
          <option value=37>Cabo Verde</option>
          <option value=38>Camboya</option>
          <option value=39>Camerún</option>
          <option value=40>Canadá</option>
          <option value=41>Chad</option>
          <option value=42>Chile</option>
          <option value=43>China</option>
          <option value=44>Chipre</option>
          <option value=45>Ciudad del Vaticano (Santa Sede)</option>
          <option value=46>Colombia</option>
          <option value=47>Comores</option>
          <option value=48>Congo</option>
          <option value=49>Congo, República Democrática del</option>
          <option value=50>Corea</option>
          <option value=51>Corea del Norte</option>
          <option value=52>Costa de Marfíl</option>
          <option value=53>Costa Rica</option>
          <option value=54>Croacia (Hrvatska)</option>
          <option value=55>Cuba</option>
          <option value=56>Dinamarca</option>
          <option value=57>Djibouti</option>
          <option value=58>Dominica</option>
          <option value=59>Ecuador</option>
          <option value=60>Egipto</option>
          <option value=61>El Salvador</option>
          <option value=62>Emiratos Árabes Unidos</option>
          <option value=63>Eritrea</option>
          <option value=64>Eslovenia</option>
          <option value=65 selected>España</option>
          <option value=66>Estados Unidos</option>
          <option value=67>Estonia</option>
          <option value=68>Etiopía</option>
          <option value=69>Fiji</option>
          <option value=70>Filipinas</option>
          <option value=71>Finlandia</option>
          <option value=72>Francia</option>
          <option value=73>Gabón</option>
          <option value=74>Gambia</option>
          <option value=75>Georgia</option>
          <option value=76>Ghana</option>
          <option value=77>Gibraltar</option>
          <option value=78>Granada</option>
          <option value=79>Grecia</option>
          <option value=80>Groenlandia</option>
          <option value=81>Guadalupe</option>
          <option value=82>Guam</option>
          <option value=83>Guatemala</option>
          <option value=84>Guayana</option>
          <option value=85>Guayana Francesa</option>
          <option value=86>Guinea</option>
          <option value=87>Guinea Ecuatorial</option>
          <option value=88>Guinea-Bissau</option>
          <option value=89>Haití</option>
          <option value=90>Honduras</option>
          <option value=91>Hungría</option>
          <option value=92>India</option>
          <option value=93>Indonesia</option>
          <option value=94>Irak</option>
          <option value=95>Irán</option>
          <option value=96>Irlanda</option>
          <option value=97>Isla Bouvet</option>
          <option value=98>Isla de Christmas</option>
          <option value=99>Islandia</option>
          <option value=100>Islas Caimán</option>
          <option value=101>Islas Cook</option>
          <option value=102>Islas de Cocos o Keeling</option>
          <option value=103>Islas Faroe</option>
          <option value=104>Islas Heard y McDonald</option>
          <option value=105>Islas Malvinas</option>
          <option value=106>Islas Marianas del Norte</option>
          <option value=107>Islas Marshall</option>
          <option value=108>Islas menores de Estados Unidos</option>
          <option value=109>Islas Palau</option>
          <option value=110>Islas Salomón</option>
          <option value=111>Islas Svalbard y Jan Mayen</option>
          <option value=112>Islas Tokelau</option>
          <option value=113>Islas Turks y Caicos</option>
          <option value=114>Islas Vírgenes (EEUU)</option>
          <option value=115>Islas Vírgenes (Reino Unido)</option>
          <option value=116>Islas Wallis y Futuna</option>
          <option value=117>Israel</option>
          <option value=118>Italia</option>
          <option value=119>Jamaica</option>
          <option value=120>Japón</option>
          <option value=121>Jordania</option>
          <option value=122>Kazajistán</option>
          <option value=123>Kenia</option>
          <option value=124>Kirguizistán</option>
          <option value=125>Kiribati</option>
          <option value=126>Kuwait</option>
          <option value=127>Laos</option>
          <option value=128>Lesotho</option>
          <option value=129>Letonia</option>
          <option value=130>Líbano</option>
          <option value=131>Liberia</option>
          <option value=132>Libia</option>
          <option value=133>Liechtenstein</option>
          <option value=134>Lituania</option>
          <option value=135>Luxemburgo</option>
          <option value=136>Macedonia, Ex-República Yugoslava de</option>
          <option value=137>Madagascar</option>
          <option value=138>Malasia</option>
          <option value=139>Malawi</option>
          <option value=140>Maldivas</option>
          <option value=141>Malí</option>
          <option value=142>Malta</option>
          <option value=143>Marruecos</option>
          <option value=144>Martinica</option>
          <option value=145>Mauricio</option>
          <option value=146>Mauritania</option>
          <option value=147>Mayotte</option>
          <option value=148>México</option>
          <option value=149>Micronesia</option>
          <option value=150>Moldavia</option>
          <option value=151>Mónaco</option>
          <option value=152>Mongolia</option>
          <option value=153>Montserrat</option>
          <option value=154>Mozambique</option>
          <option value=155>Namibia</option>
          <option value=156>Nauru</option>
          <option value=157>Nepal</option>
          <option value=158>Nicaragua</option>
          <option value=159>Níger</option>
          <option value=160>Nigeria</option>
          <option value=161>Niue</option>
          <option value=162>Norfolk</option>
          <option value=163>Noruega</option>
          <option value=164>Nueva Caledonia</option>
          <option value=165>Nueva Zelanda</option>
          <option value=166>Omán</option>
          <option value=167>Países Bajos</option>
          <option value=168>Panamá</option>
          <option value=169>Papúa Nueva Guinea</option>
          <option value=170>Paquistán</option>
          <option value=171>Paraguay</option>
          <option value=172>Perú</option>
          <option value=173>Pitcairn</option>
          <option value=174>Polinesia Francesa</option>
          <option value=175>Polonia</option>
          <option value=176>Portugal</option>
          <option value=177>Puerto Rico</option>
          <option value=178>Qatar</option>
          <option value=179>Reino Unido</option>
          <option value=180>República Centroafricana</option>
          <option value=181>República Checa</option>
          <option value=182>República de Sudáfrica</option>
          <option value=183>República Dominicana</option>
          <option value=184>República Eslovaca</option>
          <option value=185>Reunión</option>
          <option value=186>Ruanda</option>
          <option value=187>Rumania</option>
          <option value=188>Rusia</option>
          <option value=189>Sahara Occidental</option>
          <option value=190>Saint Kitts y Nevis</option>
          <option value=191>Samoa</option>
          <option value=192>Samoa Americana</option>
          <option value=193>San Marino</option>
          <option value=194>San Vicente y Granadinas</option>
          <option value=195>Santa Helena</option>
          <option value=196>Santa Lucía</option>
          <option value=197>Santo Tomé y Príncipe</option>
          <option value=198>Senegal</option>
          <option value=199>Seychelles</option>
          <option value=200>Sierra Leona</option>
          <option value=201>Singapur</option>
          <option value=202>Siria</option>
          <option value=203>Somalia</option>
          <option value=204>Sri Lanka</option>
          <option value=205>St Pierre y Miquelon</option>
          <option value=206>Suazilandia</option>
          <option value=207>Sudán</option>
          <option value=208>Suecia</option>
          <option value=209>Suiza</option>
          <option value=210>Túnez</option>
          <option value=211>Turkmenistán</option>
          <option value=212>Turquía</option>
          <option value=213>Tuvalu</option>
          <option value=214>Ucrania</option>
          <option value=215>Uganda</option>
          <option value=216>Uruguay</option>
          <option value=217>Uzbekistán</option>
          <option value=218>Vanuatu</option>
          <option value=219>Venezuela</option>
          <option value=220>Vietnam</option>
          <option value=221>Yemen</option>
          <option value=222>Yugoslavia</option>
          <option value=223>Zambia</option>
          <option value=224>Zimbabue</option>
        </select>
      </td>
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