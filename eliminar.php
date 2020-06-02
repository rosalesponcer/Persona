<?php
include("bd.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM persona WHERE id='$id'";
    if (mysqli_query($con, $query)) {
        $_SESSION['mensaje'] = "Registro eliminado con éxito";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = mysqli_error($con);
        $_SESSION['mensaje_tipo'] = "danger";
    }
    header("Location: index.php");
}
