<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/categorias/lista-categorias.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Categorías
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
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Categorías del Sistema Registrados</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <table id="tabla_categorias" class="table table-bordered table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Categoría</center></th>
                                    <th><center>Fecha Creación</center></th>
                                    <th><center>Fecha Modificación</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 0;
                                foreach ($tabla_categorias as $tabla_categoria) {
                                    $id_categoria =  $tabla_categoria['id_categoria'];
                                    $categoria =  $tabla_categoria['categoria']; ?>
                                    <tr>
                                        <td>
                                            <center><?php echo $cont += 1; ?></center>
                                        </td>
                                        <td><?php echo $tabla_categoria['categoria']; ?></td>
                                        <td><?php echo $tabla_categoria['fecha_creacion']; ?></td>
                                        <td><?php echo $tabla_categoria['fecha_actualizacion']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_categoria; ?>">
                                                    <i class="fa fa-pencil-alt"></i> Editar
                                                </button>
                                                <!-- Modal Actualizar Categorías -->
                                                <div class="modal fade" id="modal-update<?php echo $id_categoria; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #28a745; color: #fff;">
                                                                <h4 class="modal-title">Actualizar una Categoría</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre de la categoría</label>
                                                                            <input type="text" id="categoria<?php echo $id_categoria; ?>" value="<?php echo $categoria; ?>" class="form-control">
                                                                            <small style="color: red; display: none;" id="lbl_update<?php echo $id_categoria; ?>">* Este campo es requerido.</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" id="btn-update<?php echo $id_categoria; ?>">Guardar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Actualizar Categorías -->
                                                    <script>
                                                    $('#btn-update<?php echo $id_categoria; ?>').click(function () {
                                                        var categoria = $('#categoria<?php echo $id_categoria; ?>').val();
                                                        var id_categoria = '<?php echo $id_categoria; ?>';
                                                        var url = "../app/controllers/categorias/actualizar-categorias.php";

                                                        if (categoria == "") {
                                                            $('#categoria<?php echo $id_categoria; ?>').focus();
                                                            $('#lbl_update<?php echo $id_categoria; ?>').css('display', 'block');
                                                        } else {
                                                            $.get(url, {id_categoria:id_categoria, categoria:categoria}, function (datos) {
                                                                $('#rpta_update<?php echo $id_categoria; ?>').html(datos);
                                                            });
                                                        }
                                                    })
                                                    </script>
                                                    <div id="rpta_update<?php echo $id_categoria; ?>"></div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Categoría</center></th>
                                    <th><center>Fecha Creación</center></th>
                                    <th><center>Fecha Modificación</center></th>
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
        $("#tabla_categorias").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                "infoEmpty": "Mostrando 0 to 0 of 0 Categorías",
                "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorías",
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
        }).buttons().container().appendTo('#tabla_categorias_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal Crear Categorías -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h4 class="modal-title">Crear Categoría Nueva</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: #fff;">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoría</label>
                            <input type="text" id="categoria" class="form-control">
                            <small style="color: red; display: none;" id="lbl_create">* Este campo es requerido.</small>
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
    $('#btn-create').click(function () {
        var categoria = $('#categoria').val();
        var url = "../app/controllers/categorias/crear-categorias.php";
        
        if (categoria == "") {
            $('#categoria').focus();
            $('#lbl_create').css('display', 'block');
        } else {
            $.get(url, {categoria:categoria}, function (datos) {
                $('#rpta_create').html(datos);
            });
        }
    });
</script>
<div id="rpta_create"></div>
<!-- End Ajax Crear Categorías -->