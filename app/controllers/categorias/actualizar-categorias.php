<?php
include '../../config/conexion.php';

$id_categoria = $_GET['id_categoria'];
$categoria = $_GET['categoria'];

$sql = "UPDATE tb_categoria SET categoria = :categoria, fecha_actualizacion = :fecha_actualizacion WHERE id_categoria = :id_categoria";
$query = $pdo->prepare($sql);
$query->bindParam('categoria', $categoria);
$query->bindParam('fecha_actualizacion', $fecha_hora);
$query->bindParam('id_categoria', $id_categoria);
    
if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoría Actualizada Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
    // header('Location: '.$URL.'/categorias');
} else {
    //echo "Error, las contraseñas no son iguales";

    session_start();
    $_SESSION['mensaje'] = "Error, la Categoría no fue actualizada";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
    // header('Location: '.$URL.'/categorias/update.php?id='.$id_rol);
}
?>