<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/almacen/mostrar-producto.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">PRODUCTO: <?php echo $producto; ?></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Producto</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Código</label>
                                                    <input type="text" class="form-control" value="<?php echo $codigo; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Categoría</label>
                                                    <div style="display: flex;">
                                                        <input type="text" class="form-control" value="<?php echo $categoria ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Producto</label>
                                                    <input type="text" name="producto" class="form-control" value="<?php echo $producto ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Stock</label>
                                                            <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Stock Mínimo</label>
                                                            <input type="number" name="stock_min" class="form-control" value="<?php echo $stock_min; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Stock Máximo</label>
                                                            <input type="number" name="stock_max" class="form-control" value="<?php echo $stock_max; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Fecha de Ingreso</label>
                                                            <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input type="text" class="form-control" value="<?php echo $correo; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Precio de Compra</label>
                                                            <input type="number" name="precio_compra" class="form-control" value="<?php echo $precio_compra; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Precio de Venta</label>
                                                            <input type="number" name="precio_venta" class="form-control" value="<?php echo $precio_venta; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Descripción</label>
                                                    <textarea name="descripcion" id="" cols="1" rows="5" class="form-control" disabled><?php echo $descripcion; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Imagen</label>
                                            <img src="<?php echo $URL."/almacen/img_productos/".$imagen; ?>" width="100%" alt="">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <a href="<?php $URL; ?>/almacen" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../layout/part2.php'; ?>