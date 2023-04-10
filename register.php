<?php
require_once('Funciones/crud_funciones.php'); // Se incluyen las funciones definidas anteriormente

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['contrasena'];
    $estado = $_POST['estado'];
    
    crear_usuario($nombre, $email, $user, $pass, $estado); // Se llama a la función crear_usuario con los datos proporcionados
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login-Register</title>
</head>
<body>
    <form action="" method="post" class="form-login">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="user" name="user"><br>

        <label for="correo">Correo:</label>
        <input type="text" id="email" name="email"><br>

        <label for="state">Estado:</label>
        <input type="text" id="estado" name="estado"><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br>

        <input type="submit" value="Registrarse">
        <br>
        <a href="index.php">Ya tiene una cuenta?</a>
</body>
</html>