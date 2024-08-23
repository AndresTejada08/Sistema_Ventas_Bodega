<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/roles/lista-roles.php';
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
            <div class="col-md-6">
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
                        <table id="tabla_roles" class="table table-bordered table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Rol</center></th>
                                    <th><center>Fecha Creación</center></th>
                                    <th><center>Fecha Modificación</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 0;
                                foreach ($tabla_roles as $tabla_rol) {
                                    $id_rol =  $tabla_rol['id_rol'];
                                ?>
                                    <tr>
                                        <td>
                                            <center><?php echo $cont += 1; ?></center>
                                        </td>
                                        <td><?php echo $tabla_rol['rol']; ?></td>
                                        <td><?php echo $tabla_rol['fecha_creacion']; ?></td>
                                        <td><?php echo $tabla_rol['fecha_actualizacion']; ?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <a href="<?php echo $URL; ?>/roles/update.php?id=<?php echo $id_rol; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>Editar</a>
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
                                    <th><center>Rol</center></th>
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