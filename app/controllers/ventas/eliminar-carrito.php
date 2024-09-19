<?php
include '../../config/conexion.php';

$id_carrito = $_POST['id_carrito'];

$sql = "DELETE FROM tb_carrito WHERE id_carrito = :id_carrito";
$query = $pdo->prepare($sql);
$query->bindParam('id_carrito', $id_carrito);

if ($query->execute()) {
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
} else {
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
}
?>