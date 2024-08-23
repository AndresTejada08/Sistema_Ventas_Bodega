<?php
include ('../../config/conexion.php');

$proveedor = $_GET['proveedor'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$empresa = $_GET['empresa'];
$correo = $_GET['correo'];
$direccion = $_GET['direccion'];

$sql = "INSERT INTO tb_proveedor (proveedor, celular, telefono, empresa, correo, direccion, fecha_creacion) 
        VALUES (:proveedor, :celular, :telefono, :empresa, :correo, :direccion, :fecha_creacion)";
$query = $pdo->prepare($sql);
$query->bindParam('proveedor', $proveedor);
$query->bindParam('celular', $celular);
$query->bindParam('telefono', $telefono);
$query->bindParam('empresa', $empresa);
$query->bindParam('correo', $correo);
$query->bindParam('direccion', $direccion);
$query->bindParam('fecha_creacion', $fecha_hora);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor Registrado Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar el Proveedor";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
}
?>