<?php
include("bd.php");
//Recepcion de datos de index.php por metodo get en la accion editar
if (!empty($_GET)) {
    $id = $_GET['id'];
    $query = "SELECT * FROM persona WHERE id=$id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['Nombre'];
        $dni = $row['DNI'];
        $fecha = $row['FechaNacimiento'];
    }
}
//Recepcion de datos del formulario de esta pagina para modificar en la base datos
if (!empty($_POST)) {
    $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : null;
    $dni = isset($_POST['txtNombre']) ? $_POST['txtDni'] : null;
    $fecha = isset($_POST['txtNombre']) ? $_POST['txtFecha'] : null;

    $query = "INSERT INTO persona(Nombre,DNI,FechaNacimiento) VALUES('$nombre','$dni','$fecha')";

    if (mysqli_query($con, $query)) {
        $_SESSION['mensaje'] = "Registro isertado con éxito";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error Registro no isertado";
        $_SESSION['mensaje_tipo'] = "success";
    }

    header("Location: index.php");
}
?>
<?php include("includes/header.php") ?>

<div class="d-flex justify-content-center pt-5">
    <div class="col-md-4">
        <div class="card card-body">
            <form action="editar.php" method="POST">
                <div class="form-group">
                    <input type="text" name="txtNombre" class="form-control" placeholder="Nombre" value="<?= $nombre ?>" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="txtDni" class="form-control" placeholder="DNI" pattern="\d{8}" value="<?= $dni ?>">
                </div>
                <div class="form-group">
                    <input type="date" name="txtFecha" class="form-control" value="<?= $fecha ?>">
                </div>
                <input type="submit" value="Editar" name="editar" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>