<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/ventas/lista-ventas.php';
include '../app/controllers/almacen/lista-productos.php';
include '../app/controllers/clientes/lista-clientes.php';

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
                            $cont_ventas = 0;
                            foreach ($tabla_ventas as $tabla_venta) {
                                $cont_ventas += 1;

                            }
                            ?>
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro. <input type="text" style="text-align: center;" value="<?= $cont_ventas + 1; ?>" disabled></h3>
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
                                                                            var id_producto = "<?= $id_producto; ?>";
                                                                            var producto = "<?= $tabla_producto['producto']; ?>";
                                                                            var descripcion = "<?= $tabla_producto['descripcion']; ?>";
                                                                            var precio_unitario = "<?= $tabla_producto['precio_venta']; ?>";
                                                                            
                                                                            $('#id_producto').val(id_producto);
                                                                            $('#producto').val(producto);
                                                                            $('#descripcion').val(descripcion);
                                                                            $('#precio_unitario').val(precio_unitario);
                                                                            $('#cantidad').focus();

                                                                            //$('#modal-buscar-producto').modal('toggle');
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

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" id="id_producto" hidden>
                                                            <label for="">Producto</label>
                                                            <input type="text" class="form-control" name="" id="producto" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                    <div class="form-group">
                                                            <label for="">Descripción</label>
                                                            <input type="text" class="form-control" name="" id="descripcion" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <div class="form-group">
                                                            <label for="">Cantidad</label>
                                                            <input type="text" class="form-control" name="" id="cantidad">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <div class="form-group">
                                                            <label for="">P. Unit.</label>
                                                            <input type="text" class="form-control" name="" id="precio_unitario" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" id="btn_registrar_carrito" style="float: right;">Registrar</button><br><br>
                                                <script>
                                                    $('#btn_registrar_carrito').click(function() {
                                                        var cantidad = $('#cantidad').val();
                                                        var id_producto = $('#id_producto').val();
                                                        var nro_venta = '<?= $cont_ventas + 1; ?>';
                                                        
                                                        if (id_producto == "") {
                                                            alert('Debe llenar los campos');
                                                        } else if (cantidad == "") {
                                                            alert('Debe de llenar la cantidad del producto')
                                                        } else {
                                                            var url = '../app/controllers/ventas/crear-carrito.php';
                                                            $.get(url, {cantidad:cantidad, id_producto:id_producto, nro_venta:nro_venta}, function (datos) {
                                                                $('#rpta_carrito').html(datos)
                                                            });
                                                        }
                                                    })
                                                </script>
                                                <div id="rpta_carrito"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-success" id="btn-update<?php echo $id_proveedor; ?>">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Modal Visualizar Producto -->

                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th><center>Nro.</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>Descripción</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>P. Unit.</center></th>
                                        <th><center>Sub Total</center></th>
                                        <th><center>Acción</center></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nro_venta = $cont_ventas + 1;
                                        $sql_carrito = "SELECT C.*, P.producto, P.descripcion, P.precio_venta FROM tb_carrito C INNER JOIN tb_producto P ON C.id_producto = P.id_producto 
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
                                            <td><center><?= $cont_carrito; ?></center></td>
                                            <td><?= $tabla_carrito['producto']; ?></td>
                                            <td><?= $tabla_carrito['descripcion']; ?></td>
                                            <td><center><?= $tabla_carrito['cantidad']; ?></center></td>
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
                                            <td>
                                                <center>
                                                    <form action="../app/controllers/ventas/eliminar-carrito.php" method="post">
                                                        <input type="text" name="id_carrito" value="<?= $id_carrito; ?>" hidden>
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i> Quitar</button>
                                                    </form>
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
                            <b>Cliente </b>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-buscar-cliente"><i class="fa fa-search"></i> Buscar Cliente</button>

                            <!-- Modal Visualizar Cliente -->
                            <div class="modal fade" id="modal-buscar-cliente">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #e9ecef;">
                                            <h4 class="modal-title">Búsqueda del Cliente</h4><div style="width: 15px;"></div>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-agregar-cliente">
                                                <i class="fa fa-user-plus"></i> Agregar Cliente
                                            </button>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="tabla_clientes" class="table table-bordered table-hover table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th><center>Nro</center></th>
                                                            <th><center>Elegir</center></th>
                                                            <th><center>Cliente</center></th>
                                                            <th><center>DNI</center></th>
                                                            <th><center>Celular</center></th>
                                                            <th><center>Correo</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $cont_cliente = 0;
                                                        foreach ($tabla_clientes as $tabla_cliente) {
                                                            $id_cliente =  $tabla_cliente['id_cliente'];
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $cont_cliente += 1; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center><button class="btn btn-outline-info" id="btn-seleccionar-cliente<?= $id_cliente; ?>"><i class="fa fa-check"></i></button></center>
                                                                    <script>
                                                                        $('#btn-seleccionar-cliente<?= $id_cliente; ?>').click(function() {
                                                                            var id_cliente = "<?= $id_cliente; ?>";
                                                                            var cliente = "<?= $tabla_cliente['cliente']; ?>";
                                                                            var dni = "<?= $tabla_cliente['dni']; ?>";
                                                                            var celular = "<?= $tabla_cliente['celular']; ?>";
                                                                            var correo = "<?= $tabla_cliente['correo']; ?>";
                                                                            
                                                                            $('#id_cliente').val(id_cliente);
                                                                            $('#cliente').val(cliente);
                                                                            $('#dni').val(dni);
                                                                            $('#celular').val(celular);
                                                                            $('#correo').val(correo);
                                                                            //$('#cantidad').focus();

                                                                            $('#modal-buscar-cliente').modal('toggle');
                                                                            //alert(codigo);
                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $tabla_cliente['cliente']; ?></td>
                                                                <td><?php echo $tabla_cliente['dni']; ?></td>
                                                                <td><?php echo $tabla_cliente['celular']; ?></td>
                                                                <td><?php echo $tabla_cliente['correo']; ?></td>
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
                            <!-- End Modal Visualizar Cliente -->

                            <br><br>
                            <!-- Datos Cliente -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_cliente" hidden>
                                        <label for="">Nombre del Cliente</label>
                                        <input type="text" class="form-control" name="" id="cliente">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">DNI</label>
                                        <input type="text" class="form-control" name="" id="dni">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" class="form-control" name="" id="celular">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="text" class="form-control" name="" id="correo">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Total Pagado</label>
                                    <input type="text" class="form-control" name="" id="total_pagado">
                                </div>
                                <script>
                                    $('#total_pagado').keyup(function() {
                                        var total_cancelar = $('#total_cancelar').val();
                                        var total_pagado = $('#total_pagado').val();
                                        var cambio = parseFloat(total_pagado) - parseFloat(total_cancelar);

                                        $('#cambio').val(cambio);
                                    });
                                </script>
                                <div class="col-md-6">
                                    <label for="">Cambio</label>
                                    <input type="text" class="form-control" name="" id="cambio" disabled>
                                </div>
                            </div>
                            <!-- Fin Datos Venta -->

                            <hr>
                            <div class="form-group">
                                <button id="btn_registrar_venta" class="btn btn-primary btn-block">Registrar Venta</button>
                                <script>
                                    $('#btn_registrar_venta').click(function() {
                                        var id_cliente = $('#id_cliente').val();
                                        var nro_venta = '<?= $cont_ventas + 1; ?>';
                                        var total_cancelar = $('#total_cancelar').val();

                                        if(id_cliente == "") {
                                            alert("Debe seleccionar un cliente");
                                        } else {
                                            alert('todo ok');
                                        }
                                        
                                    })
                                </script>
                            </div>
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