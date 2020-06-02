<?php include("bd.php") ?>
<?php include("includes/header.php") ?>




<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-4 position-sticky">
            <?php if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['mensaje_tipo'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>



            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="txtNombre" class="form-control" placeholder="Nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtDni" class="form-control" placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <input type="date" name="txtFecha" class="form-control">
                    </div>
                    <input type="submit" value="Ingresar" name="ingresar" class="btn btn-success btn-block">
                </form>
            </div>

        </div>
        <div class="col-md-8  col-12">
            <table class="table table-hover text-center">
                <thead>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </thead>
                <tbody>

                    <?php $query = "SELECT * FROM persona";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?= $row['Nombre'] ?></td>
                            <td><?= $row['DNI'] ?></td>
                            <td><?= $row['FechaNacimiento'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-eraser"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>