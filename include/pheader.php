<?php
// cuando estemos trabajando consultas agregamos este enlace
include_once('Funciones/crud_funciones.php');

if (isset($_SESSION['cod_usuario'])) {
    $idusuario = $_SESSION['cod_usuario'];
    $row = consultarUsuarios($link, $idusuario);
} else {
    $_SESSION['mensaje_texto'] = "Error Acceso al Sistema no Registrado";
    $_SESSION['mensaje_tipo'] = "alert-danger";
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="./img/logo_php.svg" />
    <title>CRUD-PHP-MYSQL</title>

    <!-- 01- Boostrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- 02- Font Awesome 5.14 -->
    <link rel="stylesheet" href="./icon/fontawesome-free-5.14.0-web/css/all.min.css">

    <!-- 03- DataTables -->
    <script src="./js/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="./package/DataTables/datatables.min.css" />
    <script type="text/javascript" src="./package/DataTables/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#miTabla').DataTable({
                "iDisplayLength": 10,
            });
        });
    </script>

</head>

<body>
    <!-- <nav  class="navbar navbar-dark bg-dark"> -->
    <!-- <nav class="navbar navbar navbar-expand-lg navbar-dark bg-primary">         -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./admin.php">
            <img src="./img/logo_php.svg" width="30" height="30" class="d-inline-block align-top" alt="P:2"> Programación 2: CRUD-PHP-MYSQL
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./tipo_mantenimiento.php">Tipos de Mantenimientos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./mantenimiento_mant.php">Mantenimientos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="usuarios_mant.php">Usuarios</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item active">
                    <p class="nav-link"><i class="far fa-address-card"></i> <?php echo utf8_decode($row['NombreC']); ?></p>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./include/cerrar.php"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                </li>
            </ul>

        </div>
    </nav>

    <!-- Contenedor -->
    <div class="container-fluid p-4">