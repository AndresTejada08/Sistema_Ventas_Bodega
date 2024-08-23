<?php
$sql = "SELECT * FROM tb_rol";
$query = $pdo->prepare($sql);
$query->execute();

$datos_roles = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_roles as $dato_rol) {
    $nombre = $dato_rol['rol'];
}
?>