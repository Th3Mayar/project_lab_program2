<?php
require_once('Funciones/crud_funciones.php'); // Se incluyen las funciones definidas anteriormente

session_start(); // Inicia una sesión PHP

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    verificar_usuario($usuario, $contrasena); // Se llama a la función crear_usuario con los datos proporcionados
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
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario"><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br>

        <input type="submit" value="Iniciar sesión">
        <br>
        <a href="register.php">Deseas registrarte?</a>
</body>
</html>