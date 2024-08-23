<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/almacen/lista-productos.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Roles</h1>
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
                        <h3 class="card-title">Roles del Sistema Registrados</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="table table-responsive">
                            <table id="tabla_roles" class="table table-bordered table-hover table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Código</center></th>
                                        <th><center>Categoría</center></th>
                                        <th><center>Imagen</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>Descripción</center></th>
                                        <th><center>Stock</center></th>
                                        <th><center>P. Compra</center></th>
                                        <th><center>P. Venta</center></th>
                                        <th><center>F. Compra</center></th>
                                        <th><center>Usuario</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 0;
                                    foreach ($tabla_productos as $tabla_producto) {
                                        $id_producto =  $tabla_producto['id_producto'];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $cont += 1; ?></center>
                                            </td>
                                            <td><?php echo $tabla_producto['codigo']; ?></td>
                                            <td><?php echo $tabla_producto['categoria']; ?></td>
                                            <td>
                                                <img src="<?php echo $URL."/almacen/img_productos/". $tabla_producto['imagen']; ?>" width="75px" alt="">
                                            </td>
                                            <td><?php echo $tabla_producto['producto']; ?></td>
                                            <td><?php echo $tabla_producto['descripcion']; ?></td>
                                            <?php
                                            $stock_actual = $tabla_producto['stock'];
                                            $stock_max = $tabla_producto['stock_max'];
                                            $stock_min = $tabla_producto['stock_min'];
                                            if ($stock_actual < $stock_min) { ?>
                                                <td style="color: red; font-weight: bold;"><?php echo $tabla_producto['stock']; ?></td>
                                            <?php
                                            } else if ($stock_actual > $stock_max) { ?>    
                                                <td style="color: green; font-weight: bold;"><?php echo $tabla_producto['stock']; ?></td>
                                            <?php
                                            } else { ?>
                                                <td><?php echo $tabla_producto['stock']; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?php echo $tabla_producto['precio_compra']; ?></td>
                                            <td><?php echo $tabla_producto['precio_venta']; ?></td>
                                            <td><?php echo $tabla_producto['fecha_ingreso']; ?></td>
                                            <td><?php echo $tabla_producto['correo']; ?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="<?php echo $URL; ?>/almacen/show.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar</a>
                                                        <a href="<?php echo $URL; ?>/almacen/update.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                        <a href="<?php echo $URL; ?>/almacen/delete.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
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
                                        <th><center>Código</center></th>
                                        <th><center>Categoría</center></th>
                                        <th><center>Imagen</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>Descripción</center></th>
                                        <th><center>Stock</center></th>
                                        <th><center>P. Compra</center></th>
                                        <th><center>P. Venta</center></th>
                                        <th><center>F. Compra</center></th>
                                        <th><center>Usuario</center></th>
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
        $("#tabla_roles").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 to 0 of 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Roles",
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
        }).buttons().container().appendTo('#tabla_roles_wrapper .col-md-6:eq(0)');
    });
</script>