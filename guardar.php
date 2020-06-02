<?php
include("bd.php");
if (isset($_POST['ingresar'])) {
    $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : null;
    $dni = isset($_POST['txtDni']) ? $_POST['txtDni'] : null;
    $fecha = isset($_POST['txtFecha']) ? $_POST['txtFecha'] : null;

    $query = "INSERT INTO persona(Nombre,DNI,FechaNacimiento) VALUES('$nombre','$dni','$fecha')";
    $result=mysqli_query($con, $query);
    if ($result) {
        $_SESSION['mensaje'] = "New record created successfully";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = mysqli_error($con);
        $_SESSION['mensaje_tipo'] = "danger";
    }
    header("Location: index.php");
}
