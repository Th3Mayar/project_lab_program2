<?php
include_once("../Funciones/crud_funciones.php");

$conn = conectar();
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conn, $sql);

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM usuarios WHERE cod_usuario='$id'";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($query2);
}
if(isset($_POST['Nombre'])){
    $nombre = $_POST['Nombre'];
    $email = $_POST['Email'];
    $user = $_POST['Usuario'];
    $pass = $_POST['Password'];
    $estado = $_POST['Estado'];

    $update = "UPDATE usuarios SET Nombre='$nombre', Correo='$email', usuario='$user', pass='$pass', estado='$estado' WHERE cod_usuario='$id'";

    $consulta = mysqli_query($conn, $update);
}
?>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="users-table--edit" style="margin:0;">
            <a href="cerrar.php" style="color:#fff;">Cerrar Sesion</a>
    </div>
<h1>Editar usuario</h1>
        <div class="users-form">
            <form action="" method="POST" style="margin-top:10px; float:left;">
                <input type="hidden" name="id" value="<?= $row2['cod_usuario']?>">
                <input type="text" name="Nombre" placeholder="Nombre" value="<?= $row2['Nombre']?>">
                <input type="text" name="Email" placeholder="Email" value="<?= $row2['Correo']?>">
                <input type="text" name="Usuario" placeholder="Usuario" value="<?= $row2['usuario']?>">
                <input type="text" name="Password" placeholder="Password" value="<?= $row2['pass']?>">
                <input type="text" name="Estado" placeholder="Estado" value="<?= $row2['estado']?>">
                <input type="submit" value="Actualizar">
            </form>
        </div>

<div class="users-table">
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

                        <th><a href="actualizar_usuario.php?id=<?= $row['cod_usuario'] ?>" class="users-table--edit">Editar</a></th>                        <form action="" method="GET">
                        <th><a href="inicio.php?id=<?= $row['cod_usuario'] ?>" class="users-table--delete">Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
<br>
<?php
include_once("pfooter.php");
?>