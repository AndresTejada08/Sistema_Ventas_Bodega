<?php

include '../../config/conexion.php';

session_start();

if (isset($_SESSION['session_correo'])) {
    session_destroy();

    header('Location: '.$URL);
}

?>