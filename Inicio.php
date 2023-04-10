<?php
include_once("Funciones/crud_funciones.php");
$conn = conectar();
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conn, $sql);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['contrasena'];
    $estado = $_POST['estado'];
    
    crear_usuario($nombre, $email, $user, $pass, $estado); // Se llama a la función crear_usuario con los datos proporcionados
}
?>

<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="users-table--edit" style="margin:0;">
        <a href="include/cerrar.php" style="color:#fff;">Cerrar Sesion</a>
    </div>
    <div>
        <br>
        <h1>Crear usuario</h1>
        <form action="" method="post" class="form-login" style="margin-top:10px; float:left;">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
            <input type="text" id="user" name="user" placeholder="Usuario">
            <input type="text" id="email" name="email" placeholder="Correo">
            <input type="text" id="estado" name="estado" placeholder="Estado">
            <input type="password" id="contrasena" name="contrasena" placeholder="Password">
            <input type="submit" value="Crear">
    </div>

<div class="users-table">
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Cod Usuario</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['cod_usuario'] ?></th>
                        <th><?= $row['Nombre'] ?></th>
                        <th><?= $row['Correo'] ?></th>
                        <th><?= $row['usuario'] ?></th>
                        <th><?= $row['pass'] ?></th>
                        <th><?= $row['estado'] ?></th>

                        <th><a href="include/actualizar_usuario.php?id=<?= $row['cod_usuario'] ?>" class="users-table--edit">Editar</a></th>                        <form action="" method="GET">
                        <th><a href="inicio.php?id=<?= $row['cod_usuario'] ?>" class="users-table--delete">Eliminar</a></th>
                        </tr>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php
        include_once("Funciones/crud_funciones.php");

            if(isset($_GET['id'])){
                $id_usuario = $_GET['id'];
                $sql = "DELETE FROM usuarios WHERE cod_usuario = '$id_usuario'";
                echo "<br>";
                echo "<br>";
                echo "Usuario eliminado";
                echo "<br>";
            }
                
            if ($conn->query($sql) === TRUE) {
                echo "";

            } else {
                echo "";
            }
                
            $conn->close();
            
                ?>
</body>
<br>
<?php
include_once("include/pfooter.php");
?>