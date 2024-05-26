<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nom'];
    $password = $_POST['contraseña'];

    $query = "SELECT * FROM usuaris WHERE nom = ?";
    
    $enlace = mysqli_connect("database:3306", "root", "tiger", "jugadors");
    
    if ($enlace->connect_error) {
        die("Connection failed: " . $enlace->connect_error);
    }
    
    $stmt = $enlace->prepare($query);
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $enlace->error);
    }
    
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $registro = $resultado->fetch_assoc();

        if($password === $registro['contraseña']) {
            if($registro['nom'] === "admin") {
                $_SESSION['nom'] = $nombre;
                header("Location: usuarios.php");
                exit(); 
            } else {
                header("Location: plantilla.php");
                exit(); 
            }
        } else {
            $error = "Nombre de usuario o contraseña incorrectos";
        }
    } else {
        $error = "Nombre de usuario o contraseña incorrectos";
    }

    $enlace->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/estils.css">
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label for="nom">Nombre de usuario:</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="password">Contraseña:</label><br>
        <input type="contraseña" id="contraseña" name="contraseña"><br>
        <input type="submit" value="Login">
    </form>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>