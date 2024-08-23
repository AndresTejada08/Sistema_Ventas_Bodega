<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '1234');
define('BD', 'dbadonai');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo('La conexion a la BBDD fue con exito');
} catch (PDOException $e) {
    //print_r($e);
    echo('Error al conectar a la BBDD. '. $e);
}

$URL = "http://localhost:3000";

date_default_timezone_set("America/Lima");
$fecha_hora = date('Y-m-d h:i:s');
?>
