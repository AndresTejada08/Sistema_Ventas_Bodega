<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/ventas/lista-ventas.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Ventas</h1>
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
                        <h3 class="card-title">Ventas del Sistema Realiados</h3>

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
                                        <th><center>Nro. Venta</center></th>
                                        <th><center>Productos</center></th>
                                        <th><center>Cliente</center></th>
                                        <th><center>Total</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 0;
                                    foreach ($tabla_ventas as $tabla_venta) {
                                        $id_venta =  $tabla_venta['id_venta'];
                                        $id_cliente =  $tabla_venta['id_cliente'];
                                    ?>
                                        <tr>
                                            <td><center><?php echo $cont += 1; ?></center></td>
                                            <td><?= $tabla_venta['nro_venta']; ?></td>
                                            <td>
                                                <a href="" class="" data-toggle="modal" data-target="#modal-producto<?= $id_venta; ?>" style="font-weight: bold;">Producto</a>
                                                <!-- Modal Visualizar Producto -->
                                                <div class="modal fade" id="modal-producto<?= $id_venta; ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #17a2b8; color: #fff;">
                                                                <h4 class="modal-title">Productos de la Venta <?= $tabla_venta['nro_venta']; ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Datos Producto -->
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover table-striped">
                                                                        <thead>
                                                                            <th><center>Nro.</center></th>
                                                                            <th><center>Producto</center></th>
                                                                            <th><center>Descripción</center></th>
                                                                            <th><center>Cantidad</center></th>
                                                                            <th><center>P. Unit.</center></th>
                                                                            <th><center>Sub Total</center></th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $nro_venta =  $tabla_venta['nro_venta'];
                                                                            $sql_carrito = "SELECT C.*, P.id_producto, P.producto, P.descripcion, P.precio_venta, P.stock FROM tb_carrito C 
                                                                                            INNER JOIN tb_producto P ON C.id_producto = P.id_producto 
                                                                                            WHERE nro_venta = '$nro_venta' ORDER BY C.id_carrito ASC";
                                                                            $query_carrito = $pdo->prepare($sql_carrito);
                                                                            $query_carrito->execute();
                                                                            $tabla_carritos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                                                            $cont_carrito = 0;
                                                                            $cantidad_total = 0;
                                                                            $precio_unit_total = 0;
                                                                            $precio_total = 0;

                                                                            foreach ($tabla_carritos as $tabla_carrito) {
                                                                                $cont_carrito += 1;
                                                                                $id_carrito = $tabla_carrito['id_carrito'];
                                                                                $cantidad_total = $cantidad_total + $tabla_carrito['cantidad'];
                                                                                $precio_unit_total = $precio_unit_total + floatval($tabla_carrito['precio_venta']);
                                                                                ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <center><?= $cont_carrito; ?></center>
                                                                                    <input type="text" name="" id="id_producto<?= $cont_carrito; ?>" value="<?= $tabla_carrito['id_producto'] ?>" hidden>
                                                                                </td>
                                                                                <td><?= $tabla_carrito['producto']; ?></td>
                                                                                <td><?= $tabla_carrito['descripcion']; ?></td>
                                                                                <td>
                                                                                    <center><span id="cantidad<?= $cont_carrito; ?>"><?= $tabla_carrito['cantidad']; ?></span></center>
                                                                                    <input type="text" name="" id="stock<?= $cont_carrito; ?>" value="<?= $tabla_carrito['stock']; ?>" hidden>
                                                                                </td>
                                                                                <td><center><?= $tabla_carrito['precio_venta']; ?></center></td>
                                                                                <td>
                                                                                    <center>
                                                                                        <?php
                                                                                        $cantidad = floatval($tabla_carrito['cantidad']);
                                                                                        $precio_venta = floatval($tabla_carrito['precio_venta']);
                                                                                        echo $sub_total = $cantidad * $precio_venta;
                                                                                        $precio_total = $precio_total + $sub_total;
                                                                                        ?>
                                                                                    </center>
                                                                                </td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                            <tr>
                                                                                <th colspan="3" style="background-color:#e7e7e7; text-align: right;">Total</th>
                                                                                <th><center><?= $cantidad_total; ?></center></th>
                                                                                <th><center><?= $precio_unit_total; ?></center></th>
                                                                                <th><center><?= $precio_total; ?></center></th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- Fin Datos Producto -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fin Modal Visualizar Producto -->
                                            </td>
                                            <td>
                                                <a href="" class="" data-toggle="modal" data-target="#modal-cliente<?= $id_venta; ?>" style="font-weight: bold;"><?= $tabla_venta['cliente']; ?></a>
                                                <!-- Modal Agregar Cliente -->
                                                <div class="modal fade" id="modal-cliente<?= $id_venta; ?>">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #17a2b8;">
                                                                <h4 class="modal-title" style="color: #fff;">Datos del Cliente</h4><div style="width: 15px;"></div>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                </button>
                                                            </div>
                                                            <?php
                                                            $sql_clientes = "SELECT * FROM tb_cliente WHERE id_cliente = '$id_cliente'";
                                                            $query_clientes = $pdo->prepare($sql_clientes);
                                                            $query_clientes->execute();
                                                            $tabla_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
                                                            
                                                            foreach ($tabla_clientes as $tabla_cliente) {
                                                                $cliente = $tabla_cliente['cliente'];
                                                            }
                                                            ?>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="">Nombre del Cliente</label>
                                                                    <input type="text" class="form-control" name="cliente" value="<?= $tabla_cliente['cliente']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">DNI del Cliente</label>
                                                                    <input type="text" class="form-control" name="dni" value="<?= $tabla_cliente['dni']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Celular del Cliente</label>
                                                                    <input type="text" class="form-control" name="celular" value="<?= $tabla_cliente['celular']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Correo del Cliente</label>
                                                                    <input type="email" class="form-control" name="correo" value="<?= $tabla_cliente['correo']; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Agregar Cliente -->
                                            </td>
                                            <td><a href="#"><?= "S/ ".$tabla_venta['total']; ?></a></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="<?php echo $URL; ?>/ventas/show.php?id=<?php echo $id_venta; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar</a>
                                                        <a href="<?php echo $URL; ?>/ventas/delete.php?id=<?php echo $id_venta; ?>&nro_venta=<?= $nro_venta; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
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
                                        <th><center>Nro. Venta</center></th>
                                        <th><center>Productos</center></th>
                                        <th><center>Cliente</center></th>
                                        <th><center>Total</center></th>
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