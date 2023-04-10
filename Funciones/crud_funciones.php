<?php

function conectar(){
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "lab_programacion"; 
    
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection fallida: " . $conn->connect_error);
    } 

    return $conn;
}

function crear_usuario($nombre, $email, $user, $pass, $estado){
    $conn = conectar();
    
    $sql = "INSERT INTO usuarios (Nombre, Correo, usuario, pass, estado) VALUES ('$nombre', '$email', '$user', '$pass', '$estado')";

    if ($conn->query($sql) === TRUE) {
        header("inicio.php");
        
    } else {
        echo "<script>alert('Error al crear el usuario:');</script>" . $conn->error;
    }

    $conn->close();
}

function verificar_usuario($usuario, $contrasena) {
    // Conexión a la base de datos
    $conn = conectar();

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $valuate = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$contrasena'");

    if (mysqli_num_rows($valuate) > 0){
        $_SESSION['usuario'] = $usuario;
        echo "<script>alert('Correcto');</script>";
        header("location: ./inicio.php");

    }else{
        echo '<script>
                alert("Usuario no encontrado");
                window.location = "./index.php";
            </script>';
    }

    $conn->close();
}

function actualizar_usuario($nombre, $email, $user, $pass, $estado){
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "UPDATE usuarios SET Nombre='$nombre', Correo='$email', usuario='$user', pass='$pass', estado='$estado' WHERE cod_usuario='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "windows.location('./inicio.php');";
    } else {
        echo "<script>alert('Error al actualizar el usuario:');</script>" . $conn->error;
    }

    $conn->close();
}

?>

