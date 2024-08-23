<?php
include '../../config/conexion.php';

$id_proveedor = $_GET['id_proveedor'];
$proveedor = $_GET['proveedor'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$empresa = $_GET['empresa'];
$correo = $_GET['correo'];
$direccion = $_GET['direccion'];

$sql = "UPDATE tb_proveedor SET proveedor = :proveedor, celular = :celular, telefono = :telefono, empresa = :empresa, correo = :correo, direccion = :direccion, fecha_actualizacion = :fecha_actualizacion 
        WHERE id_proveedor = :id_proveedor";
$query = $pdo->prepare($sql);
$query->bindParam('proveedor', $proveedor);
$query->bindParam('celular', $celular);
$query->bindParam('telefono', $telefono);
$query->bindParam('empresa', $empresa);
$query->bindParam('correo', $correo);
$query->bindParam('direccion', $direccion);
$query->bindParam('fecha_actualizacion', $fecha_hora);
$query->bindParam('id_proveedor', $id_proveedor);
    
if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor Actualizado Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, el Proveedor no fue actualizada";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
}
?>