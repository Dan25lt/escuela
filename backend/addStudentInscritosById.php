<?php
    include '../config/database_config.php'; 

    $return_data = array();

    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $curp = $_POST['curp'];
    $estado = $_POST['estado'];
    $grado = $_POST['grado'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $query = "INSERT INTO alumnos  (
        idalumnos, 
        nombre, 
        apellido_paterno, 
        apellido_materno, 
        fecha_nacimiento, 
        curp, 
        estado, 
        grado, 
        telefono,
        email,
        estatus_alumno,
        fecha_inscripcion)
         values (null,
            '$nombre',
            '$apellido_paterno',
            '$apellido_materno',
            '$fecha_nacimiento',
            '$curp',
            '$estado',
            '$grado',
            '$telefono',
            '$email',
            'solicitud',
            NOW())";

    if ($con->query($query) === TRUE) {
        echo "Registro actualizado";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }

?>