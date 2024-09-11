<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/ventas/lista-ventas.php';
include '../app/controllers/almacen/lista-productos.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de las Ventas</h1>
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <?php
                            $cont_ventas = 1;
                            foreach ($tabla_ventas as $tabla_venta) {
                                $cont_ventas += 1;

                            }
                            ?>
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro. <input type="text" style="text-align: center;" value="<?= $cont_ventas; ?>" disabled></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <b>Carrito </b>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-buscar-producto"><i class="fa fa-search"></i> Buscar Producto</button>

                            <!-- Modal Visualizar Producto -->
                            <div class="modal fade" id="modal-buscar-producto">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #e9ecef;">
                                            <h4 class="modal-title">Búsqueda del Producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="tabla_productos" class="table table-bordered table-hover table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th><center>Nro</center></th>
                                                            <th><center>Elegir</center></th>
                                                            <th><center>Código</center></th>
                                                            <th><center>Categoría</center></th>
                                                            <th><center>Imagen</center></th>
                                                            <th><center>Producto</center></th>
                                                            <th><center>Descripción</center></th>
                                                            <th><center>Stock</center></th>
                                                            <th><center>P. Compra</center></th>
                                                            <th><center>P. Venta</center></th>
                                                            <th><center>F. Compra</center></th>
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
                                                                <td>
                                                                    <button class="btn btn-outline-info" id="btn-seleccionar<?= $id_producto; ?>"><i class="fa fa-check"></i></button>
                                                                    <script>
                                                                        $('#btn-seleccionar<?= $id_producto; ?>').click(function() {
                                                                            var id_producto = "<?= $tabla_producto['id_producto']; ?>";
                                                                            var codigo = "<?= $tabla_producto['codigo']; ?>";
                                                                            var categoria = "<?= $tabla_producto['categoria']; ?>";
                                                                            var producto = "<?= $tabla_producto['producto']; ?>";
                                                                            var usuario = "<?= $tabla_producto['nombres']; ?>";
                                                                            var correo = "<?= $tabla_producto['correo']; ?>";
                                                                            var descripcion = "<?= $tabla_producto['descripcion']; ?>";
                                                                            var stock = "<?= $tabla_producto['stock']; ?>";
                                                                            var stock_min = "<?= $tabla_producto['stock_min']; ?>";
                                                                            var stock_max = "<?= $tabla_producto['stock_max']; ?>";
                                                                            var precio_compra = "<?= $tabla_producto['precio_compra']; ?>";
                                                                            var precio_venta = "<?= $tabla_producto['precio_venta']; ?>";
                                                                            var fecha_ingreso = "<?= $tabla_producto['fecha_ingreso']; ?>";

                                                                            var ruta_img = "<?= $URL . '/almacen/img_productos/' . $tabla_producto['imagen']; ?>";

                                                                            $('#id_producto').val(id_producto);
                                                                            $('#codigo').val(codigo);
                                                                            $('#categoria').val(categoria);
                                                                            $('#producto').val(producto);
                                                                            $('#usuario').val(usuario);
                                                                            $('#correo').val(correo);
                                                                            $('#descripcion').val(descripcion);
                                                                            $('#stock').val(stock);
                                                                            $('#stock_min').val(stock_min);
                                                                            $('#stock_max').val(stock_max);
                                                                            $('#precio_compra').val(precio_compra);
                                                                            $('#precio_venta').val(precio_venta);
                                                                            $('#fecha_ingreso').val(fecha_ingreso);

                                                                            $('#stock_actual').val(stock);

                                                                            $('#imagen').attr({
                                                                                src: ruta_img
                                                                            });

                                                                            $('#modal-buscar-producto').modal('toggle');
                                                                            //alert(codigo);
                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $tabla_producto['codigo']; ?></td>
                                                                <td><?php echo $tabla_producto['categoria']; ?></td>
                                                                <td>
                                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $tabla_producto['imagen']; ?>" width="75px" alt="">
                                                                </td>
                                                                <td><?php echo $tabla_producto['producto']; ?></td>
                                                                <td><?php echo $tabla_producto['descripcion']; ?></td>
                                                                <td><?php echo $tabla_producto['stock']; ?></td>
                                                                <td><?php echo $tabla_producto['precio_compra']; ?></td>
                                                                <td><?php echo $tabla_producto['precio_venta']; ?></td>
                                                                <td><?php echo $tabla_producto['fecha_ingreso']; ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
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

                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del Cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            asd
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../layout/part2.php'; ?>

<!-- Page specific script -->
<script>
    $(function() {
        $("#tabla_productos").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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
        }).buttons().container().appendTo('#tabla_productos_wrapper .col-md-6:eq(0)');
    });

    $(function() {
        $("#tabla_proveedores").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 to 0 of 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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
        }).buttons().container().appendTo('#tabla_proveedores_wrapper .col-md-6:eq(0)');
    });
</script>