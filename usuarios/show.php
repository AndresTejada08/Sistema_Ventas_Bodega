<?php
include '../app/config/conexion.php';
include '../layout/session.php';
include '../layout/part1.php';
include '../app/controllers/usuarios/mostrar-usuarios.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Información de Usuario</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Usuario Seleccionado</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="email" name="correo" class="form-control" value="<?php echo $correo; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Rol del Usuario</label>
                                    <input type="text" name="correo" class="form-control" value="<?php echo $rol; ?>" disabled>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <a href="<?php echo $URL; ?>/usuarios" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
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