<?php
include ('../../config/conexion.php');

$categoria = $_GET['categoria'];

$sql = "INSERT INTO tb_categoria (categoria, fecha_creacion) VALUES (:categoria, :fecha_creacion)";
$query = $pdo->prepare($sql);
$query->bindParam('categoria', $categoria);
$query->bindParam('fecha_creacion', $fecha_hora);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoría Registrado Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
    // header('Location: '.$URL.'/categorias');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar la Categoría";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
    // header('Location: '.$URL.'/categorias');
}
?>