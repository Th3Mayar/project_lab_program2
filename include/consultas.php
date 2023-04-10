<?php

function mostrarTipoMantenimiento($link){

    $query = "SELECT * FROM `tipo_mantenimiento`";
    $resultado = mysqli_query($link, $query);
    
    return $resultado;    
}

function consultarTipoMantenimiento($link, $id){
    
    $query = "SELECT * FROM `tipo_mantenimiento` WHERE `codtipo_mant` = '$id'";
    $resultado = mysqli_query($link, $query);
    
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        $_SESSION['mensaje_texto'] = "Error Consultando Datos -> consultarTipoMantenimiento";
        $_SESSION['mensaje_tipo'] = "alert-danger";
        
        header("Location: ./tipo_mantenimiento.php"); 
    }
    
}

function mostrarUsuarios($link){
    
    $query = "SELECT * FROM `usuarios`";
    $resultado = mysqli_query($link, $query);
    
    return $resultado;    
}

function consultarUsuarios($link, $id){
    
    $query = "SELECT * FROM `usuarios` WHERE `codusuarios` = '$id'";
    $resultado = mysqli_query($link, $query);
    
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        $_SESSION['mensaje_texto'] = "Error Consultando Datos -> consultarUsuarios";
        $_SESSION['mensaje_tipo'] = "alert-danger";
        
        header("Location: ./usuarios_mant.php"); 
    }
    
}

function validarLogin($link, $user, $pass){
    
    $query = "SELECT * FROM `usuarios` WHERE `usuario` = '$user' AND `password` = '$pass'";
    $resultado = mysqli_query($link, $query);
     
    if (mysqli_num_rows($resultado) == 1) {
        $row =  $resultado -> fetch_assoc();
        $_SESSION['codusuarios'] = $row['codusuarios'];
        // Nuevo eliminando error de alerta
        $_SESSION['mensaje_texto'] = null;
        $_SESSION['mensaje_tipo'] = null;  
        // Nuevo eliminando error de alerta           
        header("Location: admin.php"); 
        
    } else {
        $_SESSION['mensaje_texto'] = "Error Consultando Datos -> validarUsuarios";
        $_SESSION['mensaje_tipo'] = "alert-danger";        
    }
    
}

function TipoMantenimiento($link){

    $query = "SELECT * FROM `tipo_mantenimiento` WHERE `estado` = 'A'";
    $resultado = mysqli_query($link, $query);
    
    return $resultado;    
}

function mostrarMantenimientos($link){

    $query = "SELECT * FROM `mantenimiento`";
    $resultado = mysqli_query($link, $query);
    
    return $resultado;    
}

function mostrarMantenimientosV2($link){

    $query = "SELECT 
    a.codmantenimiento, 
    a.codtipo_mant, 
    b.descripcion as tipo_mantenimiento, 
    DATE_FORMAT(a.fecha, '%d-%m-%Y') as fecha, 
    a.valor_mantenimiento, 
    a.descripcion, 
    a.estado
    FROM mantenimiento a, tipo_mantenimiento b
    where a.codtipo_mant = b.codtipo_mant";

    $resultado = mysqli_query($link, $query);
    
    return $resultado;    
}

function consultarMantenimientos($link, $id){

    $query = "SELECT 
    a.codmantenimiento, 
    a.codtipo_mant, 
    b.descripcion as tipo_mantenimiento, 
    DATE_FORMAT(a.fecha, '%d-%m-%Y') as fecha, 
    a.valor_mantenimiento, 
    a.descripcion, 
    a.estado
    FROM mantenimiento a, tipo_mantenimiento b
    WHERE a.codtipo_mant = b.codtipo_mant 
    AND a.codmantenimiento = '$id'";
    $resultado = mysqli_query($link, $query);
    
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        $_SESSION['mensaje_texto'] = "Error Consultando Datos -> consultarTipoMantenimiento";
        $_SESSION['mensaje_tipo'] = "alert-danger";
        
        header("Location: ./mantenimiento_mant.php"); 
    } 
}