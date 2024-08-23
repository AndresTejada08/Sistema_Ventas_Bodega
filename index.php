<?php
include 'app/config/conexion.php';
include 'layout/session.php';
include 'layout/part1.php';
include 'app/controllers/usuarios/lista-usuarios.php';
include 'app/controllers/roles/lista-roles.php';
include 'app/controllers/categorias/lista-categorias.php';
include 'app/controllers/almacen/lista-productos.php';
include 'app/controllers/proveedores/lista-proveedores.php';
include 'app/controllers/compras/lista-compras.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido al Sistema de Ventas - <?php echo $sesion_rol; ?></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <br><br>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats -bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!---->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $cont_usuario = 0;
                            foreach ($tabla_usuarios as $tabla_usuario) {
                                $cont_usuario += 1; } ?>
                            <h3><?php echo $cont_usuario; ?></h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
                            Mas Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Reporte Roles -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $cont_rol = 0;
                            foreach ($tabla_roles as $tabla_rol) {
                                $cont_rol += 1; } ?>
                            <h3><?php echo $cont_rol; ?></h3>
                            <p>Roles Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/roles/create.php">
                            <div class="icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
                            Mas Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- End Reporte Roles -->

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>64</h3>
                            <p>Visitantes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Reporte Categorías -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $cont_categoria = 0;
                            foreach ($tabla_categorias as $tabla_categoria) {
                                $cont_categoria += 1; } ?>
                            <h3><?php echo $cont_categoria; ?></h3>
                            <p>Categorías Registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/categorias">
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/categorias" class="small-box-footer">
                            Mas Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- End Reporte Categorías -->

                <!-- Reporte Productos -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $cont_producto = 0;
                            foreach ($tabla_productos as $tabla_producto) {
                                $cont_producto += 1; } ?>
                            <h3><?php echo $cont_producto; ?></h3>
                            <p>Productos Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/almacen/create.php">
                            <div class="icon">
                                <i class="fas fa-list"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/almacen" class="small-box-footer">
                            Mas Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- End Reporte Productos -->

                <!-- Reporte Proveedores -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php
                            $cont_proveedor = 0;
                            foreach ($tabla_proveedores as $tabla_proveedor) {
                                $cont_proveedor += 1; } ?>
                            <h3><?php echo $cont_proveedor; ?></h3>
                            <p>Proveedores Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/proveedores">
                            <div class="icon">
                                <i class="fas fa-car"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/proveedores" class="small-box-footer">
                            Mas Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- End Reporte Proveedores -->

                <!-- Reporte Compras -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                            $cont_compra = 0;
                            foreach ($tabla_compras as $tabla_compra) {
                                $cont_compra += 1; } ?>
                            <h3><?php echo $cont_compra; ?></h3>
                            <p>Compras Registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/compras">
                            <div class="icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/compras" class="small-box-footer">
                            Mas Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- End Reporte Compras -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layout/part2.php'; ?>