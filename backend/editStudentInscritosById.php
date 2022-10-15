<?php
    include '../config/database_config.php'; 

    $return_data = array();

    $idalumnos = $_POST['idalumnos'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $curp = $_POST['curp'];
    $estado = $_POST['estado'];
    $grado = $_POST['grado'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $query = "UPDATE alumnos 
    SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', fecha_nacimiento = '$fecha_nacimiento', curp = '$curp', estado = '$estado', grado = '$grado', telefono = '$telefono', email = '$email'
    WHERE idalumnos = '$idalumnos'";

    if ($con->query($query) === TRUE) {
        echo "Registro actualizado";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }

?>