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
                    <h1 class="m-0">Actualización de la Compra</h1>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los Datos del Nuevo Producto</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div style="display: flex;">
                                <h5>Datos del Producto</h5>
                                <div style="width: 15px;"></div>
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
                            </div>

                            <hr>
                            <!-- Formulario Producto -->
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
                                                <textarea name="descripcion" id="descripcion" cols="1" rows="5" class="form-control" disabled><?= $descripcion; ?></textarea>
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
                            <!-- End Formulario Producto -->

                            <hr>
                            <div style="display: flex;">
                                <h5>Datos del Proveedor</h5>
                                <div style="width: 15px;"></div>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-buscar-proveedor"><i class="fa fa-search"></i> Buscar Proveedor</button>
                                
                                <!-- Modal Visualizar Proveedor -->
                                <div class="modal fade" id="modal-buscar-proveedor">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #e9ecef;">
                                                <h4 class="modal-title">Búsqueda del Proveedor</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table table-responsive">
                                                    <table id="tabla_proveedores" class="table table-bordered table-hover table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th><center>Nro</center></th>
                                                                <th><center>Elegir</center></th>
                                                                <th><center>Proveedor</center></th>
                                                                <th><center>Celular</center></th>
                                                                <th><center>Telefono</center></th>
                                                                <th><center>Empresa</center></th>
                                                                <th><center>Correo</center></th>
                                                                <th><center>Dirección</center></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $cont = 0;
                                                            foreach ($tabla_proveedores as $tabla_proveedor) {
                                                                $id_proveedor =  $tabla_proveedor['id_proveedor'];
                                                                $proveedor =  $tabla_proveedor['proveedor']; ?>
                                                                <tr>
                                                                    <td>
                                                                        <center><?php echo $cont += 1; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-outline-info" id="btn-seleccionar_proveedor<?= $id_proveedor; ?>"><i class="fa fa-check"></i></button>
                                                                        <!-- Trasladar Datos Proveedor -->
                                                                        <script>
                                                                            $('#btn-seleccionar_proveedor<?= $id_proveedor; ?>').click(function () {
                                                                                //alert("Hola");
                                                                                var id_proveedor = '<?= $id_proveedor; ?>';
                                                                                var proveedor = '<?= $proveedor; ?>';
                                                                                var celular = '<?= $tabla_proveedor['celular']; ?>';
                                                                                var empresa = '<?= $tabla_proveedor['empresa']; ?>';
                                                                                var telefono = '<?= $tabla_proveedor['telefono']; ?>';
                                                                                var correo = '<?= $tabla_proveedor['correo']; ?>';
                                                                                var direccion = '<?= $tabla_proveedor['direccion']; ?>';
                                                                                $('#id_proveedor').val(id_proveedor);
                                                                                $('#proveedor').val(proveedor);
                                                                                $('#celular').val(celular);
                                                                                $('#empresa').val(empresa);
                                                                                $('#telefono').val(telefono);
                                                                                $('#correo').val(correo);
                                                                                $('#direccion').val(direccion);

                                                                                $('#modal-buscar-proveedor').modal('toggle');
                                                                            });
                                                                        </script>
                                                                        <!-- End Trasladar Datos Proveedor -->
                                                                    </td>
                                                                    <td><?php echo $tabla_proveedor['proveedor']; ?></td>
                                                                    <td>                                                                        
                                                                        <a href="https://wa.me/51<?= $tabla_proveedor['celular']; ?>" class="" target="_blank" style="font-weight: bold;"><i class="fa fa-phone-volume"></i> <?php echo $tabla_proveedor['celular']; ?></a>
                                                                    </td>
                                                                    <td><?php echo $tabla_proveedor['telefono']; ?></td>
                                                                    <td><?php echo $tabla_proveedor['empresa']; ?></td>
                                                                    <td><?php echo $tabla_proveedor['correo']; ?></td>
                                                                    <td><?php echo $tabla_proveedor['direccion']; ?></td>
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
                                <!-- End Modal Visualizar Proveedor -->
                            </div>
                            
                            <hr>
                            <!-- Formulario Proveedor -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_proveedor" value="<?= $id_proveedor2; ?>" hidden>
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
                            <!-- End Formulario Proveedor -->

                            <hr>
                            <!-- Formulario Compra -->
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Nro. Compra</label>
                                        <input type="text" class="form-control" value="<?= $nro_compra; ?>" disabled>
                                        <input type="text" id="nro_compra" value="<?= $nro_compra; ?>" hidden>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Fecha Compra</label>
                                        <input type="date" class="form-control" id="fecha_compra" value="<?= $fecha_compra; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Comprobante</label>
                                        <input type="text" class="form-control" id="comprobante" value="<?= $comprobante; ?>">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Precio Compra</label>
                                        <input type="text" class="form-control" id="precio_compra_controlador" value="<?= $compra_precio_compra; ?>">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Stock Actual</label>
                                        <input type="text" class="form-control" id="stock_actual" value="<?= $stock - $cantidad; ?>" style="background-color: yellow;" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Stock Total</label>
                                        <input type="text" class="form-control" id="stock_total" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="">Cantidad</label>
                                        <input type="number" class="form-control" id="cantidad" value="<?= $cantidad; ?>">
                                        <script>
                                            $('#cantidad').keyup( function () {
                                                sumaCantidad();
                                            });

                                            sumaCantidad();
                                            function sumaCantidad () {
                                                var stock_actual = $('#stock_actual').val();
                                                var cantidad = $('#cantidad').val();
                                                var total = parseInt(stock_actual) + parseInt(cantidad);
                                                
                                                $('#stock_total').val(total);
                                            }
                                        </script>
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
                                        <button class="btn btn-success btn-block" id="btn_actualizar_compra"><i class="fa fa-pencil-alt"></i> Actualizar</button>
                                    </div>
                                </div>
                                <script>
                                    $('#btn_actualizar_compra').click( function () {
                                        var id_compra = '<?= $id_compra; ?>'
                                        var nro_compra = $('#nro_compra').val();
                                        var fecha_compra = $('#fecha_compra').val();
                                        var comprobante = $('#comprobante').val();
                                        var precio_compra = $('#precio_compra_controlador').val();
                                        var cantidad = $('#cantidad').val();
                                        var id_producto = $('#id_producto').val();
                                        var id_proveedor = $('#id_proveedor').val();
                                        var id_usuario = '<?= $sesion_id_usuario; ?>';
                                        var stock_total = $('#stock_total').val();

                                        var url = "../app/controllers/compras/actualizar-compras.php";

                                        if (id_producto == "") {
                                            $('#id_producto').focus();
                                            alert("Debe llenar todos los campos");
                                        } else if (fecha_compra == "") {
                                            $('#fecha_compra').focus();
                                            alert("Debe llenar todos los campos");
                                        } else if (comprobante == "") {
                                            $('#comprobante').focus();
                                            alert("Debe llenar todos los campos");
                                        } else if (precio_compra == "") {
                                            $('#precio_compra_controlador').focus();
                                            alert("Debe llenar todos los campos");
                                        } else if (cantidad == "") {
                                            $('#cantidad').focus();
                                            alert("Debe llenar todos los campos");
                                        } else {
                                            $.get(url, {id_compra: id_compra, nro_compra: nro_compra, fecha_compra: fecha_compra, comprobante: comprobante, precio_compra: precio_compra, 
                                                cantidad: cantidad, id_producto: id_producto, id_proveedor: id_proveedor, id_usuario: id_usuario, stock_total: stock_total}, function(datos) {
                                                $('#rpta_update').html(datos);
                                        });
                                        }
                                    })
                                </script>
                            </div>
                            <!-- End Formulario Compra -->

                            <div id="rpta_update"></div>
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