<?php
$id_venta = $_GET['id'];

include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/ventas/mostrar-venta.php';
include '../app/controllers/clientes/mostrar-cliente.php';

include '../app/controllers/almacen/lista-productos.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle de las Venta Nro. <?= $nro_venta; ?></h1>
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
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro. <input type="text" style="text-align: center;" value="<?= $nro_venta; ?>" disabled></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

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
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del Cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <!-- Datos Cliente -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_cliente" hidden>
                                        <label for="">Nombre del Cliente</label>
                                        <input type="text" class="form-control" name="" id="cliente" value="<?= $cliente; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">DNI</label>
                                        <input type="text" class="form-control" name="" id="dni" value="<?= $dni; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" class="form-control" name="" id="celular" value="<?= $celular; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="text" class="form-control" name="" id="correo" value="<?= $correo; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Datos Cliente -->

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar Venta</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <!-- Datos Venta -->
                            <div class="form-group">
                                <label for="">Total a Cancelar</label>
                                <input type="text" class="form-control" name="" id="total_cancelar" value="<?= $precio_total; ?>" disabled>
                            </div>
                            <!-- Fin Datos Venta -->

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
        $("#tabla_clientes").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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
        }).buttons().container().appendTo('#tabla_clientes_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal Agregar Cliente -->
<div class="modal fade" id="modal-agregar-cliente">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745;">
                <h4 class="modal-title" style="color: #fff;">Agregar Nuevo Cliente</h4><div style="width: 15px;"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../app/controllers/clientes/crear-clientes.php" method="post">
                    <div class="form-group">
                        <label for="">Nombre del Cliente</label>
                        <input type="text" class="form-control" name="cliente" id="">
                    </div>
                    <div class="form-group">
                        <label for="">DNI del Cliente</label>
                        <input type="text" class="form-control" name="dni" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Celular del Cliente</label>
                        <input type="text" class="form-control" name="celular" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Correo del Cliente</label>
                        <input type="email" class="form-control" name="correo" id="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Guardar Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Agregar Cliente -->