<?php

    session_start();

    // limpiar datos de sesion
    session_destroy();

    header("Location: ../index.php");