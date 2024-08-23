<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/compras/lista-compras.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Compras</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Compras del Sistema Registrados</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="table table-responsive">
                            <table id="tabla_compras" class="table table-bordered table-hover table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro. Compra</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>F. Compra</center></th>
                                        <th><center>Proveedor</center></th>
                                        <th><center>Comprobante</center></th>
                                        <th><center>Usuario</center></th>
                                        <th><center>P. Compra</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 0;
                                    foreach ($tabla_compras as $tabla_compra) {
                                        $id_compra =  $tabla_compra['id_compra'];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $cont += 1; ?></center>
                                            </td>
                                            <td><?php echo $tabla_compra['nro_compra']; ?></td>
                                            <td>
                                                <a href="" class="" data-toggle="modal" data-target="#modal-producto<?= $id_compra; ?>" style="font-weight: bold;"><?php echo $tabla_compra['producto']; ?></a>
                                                <!-- Modal Visualizar Producto -->
                                                <div class="modal fade" id="modal-producto<?= $id_compra; ?>">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #28a745; color: #fff;">
                                                                <h4 class="modal-title">Datos del Producto</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                    <label for="">Código</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['codigo']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="">Producto</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['producto']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Descripción</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['descripcion']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                    <label for="">Stock</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['stock']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Stock Mínimo</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['stock_min']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Stock Máximo</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['stock_max']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Fecha Ingreso</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['fecha_ingreso']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Precio Compra</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['producto_precio_compra']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Precio Venta</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['precio_venta']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Categoria</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['categoria']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Usuario</label>
                                                                                    <input type="text" class="form-control" value="<?= $tabla_compra['nombres']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Imagen</label>
                                                                            <img src="<?= $URL."/almacen/img_productos/".$tabla_compra['imagen'];?>" width="100%" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" id="btn-update<?php echo $id_proveedor; ?>">Guardar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Visualizar Producto -->
                                            </td>
                                            <td><?php echo $tabla_compra['fecha_compra']; ?></td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#modal-proveedor<?= $id_compra; ?>" style="font-weight: bold;"><?= $tabla_compra['proveedor']; ?></a>
                                                
                                                <!-- Modal Visualizar Proveedor -->
                                                <div class="modal fade" id="modal-proveedor<?= $id_compra; ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #28a745; color: #fff;">
                                                                <h4 class="modal-title">Datos del Proveedor</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Proveedor</label>
                                                                            <input type="text" class="form-control" value="<?= $tabla_compra['proveedor']; ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="">Celular</label>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <a href="https://wa.me/51<?= $tabla_compra['celular']; ?>" class="btn btn-success" target="_blank"><i class="fa fa-phone"></i></a>
                                                                            </div>
                                                                            <input type="text" class="form-control" value="<?= $tabla_compra['celular']; ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Teléfono</label>
                                                                            <input type="text" class="form-control" value="<?= $tabla_compra['telefono']; ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Empresa</label>
                                                                            <input type="text" class="form-control" value="<?= $tabla_compra['empresa']; ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Correo</label>
                                                                            <input type="text" class="form-control" value="<?= $tabla_compra['correo']; ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Dirección</label>
                                                                            <textarea name="" id="" class="form-control" rows="1" disabled><?= $tabla_compra['direccion']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" id="btn-update<?php echo $id_proveedor; ?>">Guardar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Visualizar Proveedor -->
                                                 
                                            </td>
                                            <td><?php echo $tabla_compra['comprobante']; ?></td>
                                            <td><?php echo $tabla_compra['nombres']; ?></td>
                                            <td><?php echo $tabla_compra['compra_precio_compra']; ?></td>
                                            <td><?php echo $tabla_compra['cantidad']; ?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="<?php echo $URL; ?>/compras/show.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar</a>
                                                        <a href="<?php echo $URL; ?>/compras/update.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                        <a href="<?php echo $URL; ?>/compras/delete.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro. Compra</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>F. Compra</center></th>
                                        <th><center>Proveedor</center></th>
                                        <th><center>Comprobante</center></th>
                                        <th><center>Usuario</center></th>
                                        <th><center>P. Compra</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                </tfoot>
                            </table>
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

<?php include '../layout/mensaje.php'; ?>
<?php include '../layout/part2.php'; ?>

<!-- Page specific script -->
<script>
    $(function() {
        $("#tabla_compras").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 to 0 of 0 Compras",
                "infoFiltered": "(Filtrado de _MAX_ total Compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Compras",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy'
                }, {
                    extend: 'pdf',
                }, {
                    extend: 'csv',
                }, {
                    extend: 'excel',
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }]},
                {
                    extend: 'colvis',
                    text: 'Visor de columnas'
                }],
        }).buttons().container().appendTo('#tabla_compras_wrapper .col-md-6:eq(0)');
    });
</script>