<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/almacen/lista-productos.php';
include '../app/controllers/proveedores/lista-proveedores.php';
include '../app/controllers/compras/mostrar-compra.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Compra Nro. <?= $nro_compra; ?></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Estás seguro de eliminar la Compra?</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" id="id_producto" value="<?= $id_producto2; ?>" hidden>
                                                <label for="">Código</label>
                                                <input type="text" class="form-control" id="codigo" value="<?= $codigo; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Categoría</label>
                                                <div style="display: flex;">
                                                    <input type="text" class="form-control" id="categoria" value="<?= $categoria; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Producto</label>
                                                <input type="text" name="producto" class="form-control" id="producto" value="<?= $producto; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Stock</label>
                                                        <input type="number" name="stock" class="form-control" id="stock" value="<?= $stock; ?>" style="background-color: yellow;" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Stock Mínimo</label>
                                                        <input type="number" name="stock_min" class="form-control" id="stock_min" value="<?= $stock_min; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Stock Máximo</label>
                                                        <input type="number" name="stock_max" class="form-control" id="stock_max" value="<?= $stock_max; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Fecha de Ingreso</label>
                                                        <input type="date" name="fecha_ingreso" class="form-control" id="fecha_ingreso" value="<?= $fecha_ingreso; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input type="text" class="form-control" id="usuario" value="<?= $usuario; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Precio de Compra</label>
                                                        <input type="number" name="precio_compra" class="form-control" id="precio_compra" value="<?= $producto_precio_compra; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Precio de Venta</label>
                                                        <input type="number" name="precio_venta" class="form-control" id="precio_venta" value="<?= $precio_venta; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Descripción</label>
                                                <textarea name="descripcion" id="descripcion" cols="1" rows="5" class="form-control" disabled><?= $descripcion?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <img src="<?php echo $URL . "/almacen/img_productos/" . $imagen; ?>" id="imagen" width="100%" alt="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div style="display: flex;">
                                <h5>Datos del Proveedor</h5>
                            </div>
                            
                            <hr>
                            <!---->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_proveedor" hidden>
                                        <label for="">Nombre de Proveedor</label>
                                        <input type="text" id="proveedor" class="form-control" value="<?= $nombre_proveedor; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="number" id="celular" class="form-control" value="<?= $celular; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Empresa</label>
                                        <input type="text" id="empresa" class="form-control" value="<?= $empresa; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="number" id="telefono" class="form-control" value="<?= $telefono; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="email" id="correo" class="form-control" value="<?= $correo; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <textarea name="" id="direccion" class="form-control" rows="1" disabled><?= $direccion; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!---->
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Nro. Compra</label>
                                        <input type="text" class="form-control" value="<?= $id_compra; ?>" disabled>
                                        <input type="text" id="nro_compra" value="<?= $id_compra; ?>" hidden>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Fecha Compra</label>
                                        <input type="date" class="form-control" id="fecha_compra" value="<?= $fecha_compra; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Comprobante</label>
                                        <input type="text" class="form-control" id="comprobante" value="<?= $comprobante; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Precio Compra</label>
                                        <input type="text" class="form-control" id="precio_compra_controlador" value="<?= $compra_precio_compra; ?>" disabled>
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Cantidad</label>
                                        <input type="number" class="form-control" id="cantidad" value="<?= $cantidad; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Usuario</label>
                                        <input type="text" class="form-control" value="<?= $usuario; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">-</label>
                                        <button class="btn btn-danger btn-block" id="btn_eliminar_compra"><i class="fa fa-trash"></i> Eliminar</button>
                                    </div>
                                </div>
                                <div id="respuesta_delete"></div>
                                <script>
                                    $('#btn_eliminar_compra').click(function () {
                                        var id_compra = '<?= $id_compra; ?>';
                                        var id_producto = $('#id_producto').val();
                                        var cantidad = '<?= $cantidad; ?>';
                                        var stock = '<?= $stock; ?>';

                                        Swal.fire({
                                            title: '¿Estás seguro de eliminar la Compra?',
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Si, deseo eliminar'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire(
                                                    eliminar(),
                                                    'Compra eliminada',
                                                    'success'

                                                )
                                            }
                                        });

                                        function eliminar() {
                                            var url = "../app/controllers/compras/eliminar-compra.php";
                                            $.get(url, {id_compra:id_compra, id_producto:id_producto, cantidad:cantidad, stock:stock},function (datos) {
                                                $('#respuesta_delete').html(datos);
                                            });
                                        }
                                    });
                                </script>
                            </div>
                            <div id="rpta_create"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../layout/part2.php'; ?>