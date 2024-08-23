<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/proveedores/lista-proveedores.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Proveedores
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i> Agregar Nuevo
                        </button>
                    </h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-10">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Proveedores del Sistema Registrados</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <table id="tabla_proveedores" class="table table-bordered table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Proveedor</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Telefono</center></th>
                                    <th><center>Empresa</center></th>
                                    <th><center>Correo</center></th>
                                    <th><center>Dirección</center></th>
                                    <th><center>Acciones</center></th>
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
                                        <td><?php echo $tabla_proveedor['proveedor']; ?></td>
                                        <td>
                                            <a href="https://wa.me/51<?= $tabla_proveedor['celular']; ?>" class="" target="_blank" style="font-weight: bold;"><i class="fa fa-phone-volume"></i> <?php echo $tabla_proveedor['celular']; ?></a>
                                        </td>
                                        <td><?php echo $tabla_proveedor['telefono']; ?></td>
                                        <td><?php echo $tabla_proveedor['empresa']; ?></td>
                                        <td><?php echo $tabla_proveedor['correo']; ?></td>
                                        <td><?php echo $tabla_proveedor['direccion']; ?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor; ?>">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!-- Modal Actualizar Proveedores -->
                                                    <div class="modal fade" id="modal-update<?= $id_proveedor; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #28a745; color: #fff;">
                                                                    <h4 class="modal-title">Actualizar un Proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre de Proveedor</label>
                                                                                <input type="text" id="proveedor<?= $id_proveedor; ?>" class="form-control" value="<?= $proveedor; ?>">
                                                                                <small style="color: red; display: none;" id="lbl_proveedor<?= $id_proveedor; ?>">* Este campo es requerido.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label for="">Celular</label>
                                                                                <input type="number" id="celular<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['celular'];; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa</label>
                                                                                <input type="text" id="empresa<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['empresa']; ?>">
                                                                                <small style="color: red; display: none;" id="lbl_empresa<?= $id_proveedor; ?>">* Este campo es requerido.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label for="">Teléfono</label>
                                                                                <input type="number" id="telefono<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['telefono']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <div class="form-group">
                                                                                <label for="">Dirección</label>
                                                                                <textarea name="" id="direccion<?= $id_proveedor; ?>" class="form-control" rows="1"><?= $tabla_proveedor['direccion']; ?></textarea>
                                                                                <small style="color: red; display: none;" id="lbl_direccion<?= $id_proveedor; ?>">* Este campo es requerido.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label for="">Correo</label>
                                                                                <input type="email" id="correo<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['correo']; ?>">
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
                                                    <!-- End Modal Actualizar Proveedores -->
                                                    <script>
                                                        $('#btn-update<?php echo $id_proveedor; ?>').click(function() {
                                                            var proveedor = $('#proveedor<?= $id_proveedor; ?>').val();
                                                            var id_proveedor = '<?= $id_proveedor; ?>';
                                                            var celular = $('#celular<?= $id_proveedor; ?>').val();
                                                            var telefono = $('#telefono<?= $id_proveedor; ?>').val();
                                                            var empresa = $('#empresa<?= $id_proveedor; ?>').val();
                                                            var correo = $('#correo<?= $id_proveedor; ?>').val();
                                                            var direccion = $('#direccion<?= $id_proveedor; ?>').val();
                                                            var url = "../app/controllers/proveedores/actualizar-proveedores.php";

                                                            if (proveedor == "") {
                                                                $('#categoria<?php echo $id_proveedor; ?>').focus();
                                                                $('#lbl_update<?php echo $id_proveedor; ?>').css('display', 'block');
                                                            } else if (empresa == "") {
                                                                $('#empresa<?= $id_proveedor; ?>').focus();
                                                                $('#lbl_empresa<?= $id_proveedor; ?>').css('display', 'block');
                                                            } else if (direccion == "") {
                                                                $('#direccion<?= $id_proveedor; ?>').focus();
                                                                $('#lbl_direccion<?= $id_proveedor; ?>').css('display', 'block');
                                                            } else {
                                                                $.get(url, {
                                                                    id_proveedor: id_proveedor,
                                                                    proveedor: proveedor,
                                                                    celular: celular,
                                                                    telefono: telefono,
                                                                    empresa: empresa,
                                                                    correo: correo,
                                                                    direccion: direccion
                                                                }, function(datos) {
                                                                    $('#rpta_update<?= $id_proveedor; ?>').html(datos);
                                                                });
                                                            }
                                                        })
                                                    </script>
                                                    <div id="rpta_update<?php echo $id_proveedor; ?>"></div>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_proveedor; ?>">
                                                        <i class="fa fa-trash"></i> Borrar
                                                    </button>
                                                    <!-- Modal Eliminar Proveedores -->
                                                    <div class="modal fade" id="modal-delete<?= $id_proveedor; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #c82333; color: #fff;">
                                                                    <h4 class="modal-title">¿Estás seguro de eliminar a este Proveedor?</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre de Proveedor</label>
                                                                                <input type="text" id="proveedor<?= $id_proveedor; ?>" class="form-control" value="<?= $proveedor; ?>" disabled>
                                                                                <small style="color: red; display: none;" id="lbl_proveedor<?= $id_proveedor; ?>">* Este campo es requerido.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label for="">Celular</label>
                                                                                <input type="number" id="celular<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['celular'];; ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa</label>
                                                                                <input type="text" id="empresa<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['empresa']; ?>" disabled>
                                                                                <small style="color: red; display: none;" id="lbl_empresa<?= $id_proveedor; ?>">* Este campo es requerido.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label for="">Teléfono</label>
                                                                                <input type="number" id="telefono<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['telefono']; ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <div class="form-group">
                                                                                <label for="">Dirección</label>
                                                                                <textarea name="" id="direccion<?= $id_proveedor; ?>" class="form-control" rows="1" disabled><?= $tabla_proveedor['direccion']; ?></textarea>
                                                                                <small style="color: red; display: none;" id="lbl_direccion<?= $id_proveedor; ?>">* Este campo es requerido.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label for="">Correo</label>
                                                                                <input type="email" id="correo<?= $id_proveedor; ?>" class="form-control" value="<?= $tabla_proveedor['correo']; ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                    <button type="button" class="btn btn-danger" id="btn-delete<?php echo $id_proveedor; ?>">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Actualizar Proveedores -->
                                                    <script>
                                                        $('#btn-delete<?php echo $id_proveedor; ?>').click(function() {
                                                            var id_proveedor = '<?= $id_proveedor; ?>';
                                                            var url2 = "../app/controllers/proveedores/eliminar-proveedores.php";

                                                            $.get(url2, {id_proveedor: id_proveedor}, function(datos) {
                                                                $('#rpta_delete<?= $id_proveedor; ?>').html(datos);
                                                            });
                                                        })
                                                    </script>
                                                    <div id="rpta_delete<?php echo $id_proveedor; ?>"></div>
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
                                    <th><center>Proveedor</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Telefono</center></th>
                                    <th><center>Empresa</center></th>
                                    <th><center>Correo</center></th>
                                    <th><center>Dirección</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </tfoot>
                        </table>
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
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas'
                }
            ],
        }).buttons().container().appendTo('#tabla_proveedores_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal Crear Categorías -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h4 class="modal-title">Crear Nuevo Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: #fff;">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Nombre de Proveedor</label>
                            <input type="text" id="proveedor" class="form-control">
                            <small style="color: red; display: none;" id="lbl_proveedor">* Este campo es requerido.</small>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Celular</label>
                            <input type="number" id="celular" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Empresa</label>
                            <input type="text" id="empresa" class="form-control">
                            <small style="color: red; display: none;" id="lbl_empresa">* Este campo es requerido.</small>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input type="number" id="telefono" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <textarea name="" id="direccion" class="form-control" rows="1"></textarea>
                            <small style="color: red; display: none;" id="lbl_direccion">* Este campo es requerido.</small>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="email" id="correo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-create">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Crear Categorías -->

<!-- Ajax Crear Categorias -->
<script>
    $('#btn-create').click(function() {
        var proveedor = $('#proveedor').val();
        var celular = $('#celular').val();
        var telefono = $('#telefono').val();
        var empresa = $('#empresa').val();
        var correo = $('#correo').val();
        var direccion = $('#direccion').val();
        var url = "../app/controllers/proveedores/crear-proveedores.php";

        if (proveedor == "") {
            $('#categoria').focus();
            $('#lbl_proveedor').css('display', 'block');
        } else if (empresa == "") {
            $('#empresa').focus();
            $('#lbl_empresa').css('display', 'block');
        } else if (direccion == "") {
            $('#direccion').focus();
            $('#lbl_direccion').css('display', 'block');
        } else {
            $.get(url, {
                proveedor: proveedor,
                celular: celular,
                telefono: telefono,
                empresa: empresa,
                correo: correo,
                direccion: direccion
            }, function(datos) {
                $('#rpta_create').html(datos);
            });
        }
    });
</script>
<div id="rpta_create"></div>
<!-- End Ajax Crear Categorías -->