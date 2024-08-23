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
                    <h1 class="m-0">Registro de un Nuevo Usuario</h1>
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
                        <h3 class="card-title">Ingrese los Datos del Nuevo Usuario</h3>

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
                                <form action="../app/controllers/usuarios/crear-usuarios.php" method="post">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese aquí el Nombre Completo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="email" name="correo" class="form-control" placeholder="Ingrese aquí el Correo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol del Usuario</label>
                                        <select name="rol" id="" class="form-control">
                                            <?php
                                            foreach ($tabla_roles as $tabla_rol) { ?>
                                                <option value="<?php echo $tabla_rol['id_rol']; ?>"><?php echo $tabla_rol['rol']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="text" name="contrasena" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Repita la Contraseña</label>
                                        <input type="text" name="repite_contrasena" class="form-control" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a href="<?php $URL; ?>/usuarios" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
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

<?php include '../layout/part2.php'; ?>