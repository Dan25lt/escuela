<?php
    include '../config/database_config.php'; 

    $_post = json_decode(file_get_contents('php://input'),true);
    $id = $_post['id'];


    $return_data = array();
    
    $query = "SELECT idalumnos,nombre,apellido_paterno,apellido_materno, curp, estado,grado,telefono, email, idusuarios,estatus_alumno, date_format(fecha_inscripcion, '%Y-%m-%d' ) as fecha_inscripcion , date_format(fecha_nacimiento, '%Y-%m-%d' ) as fecha_nacimiento FROM alumnos WHERE idalumnos = $id";

    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $rowObj = new stdClass();

            $rowObj->idalumnos = $row['idalumnos'];
            $rowObj->nombre = $row['nombre'];
            $rowObj->apellido_paterno = $row['apellido_paterno'];
            $rowObj->apellido_materno = $row['apellido_materno'];
            $rowObj->fecha_nacimiento = $row['fecha_nacimiento'];
            $rowObj->curp = $row['curp'];
            $rowObj->estado = $row['estado'];
            $rowObj->grado = $row['grado'];
            $rowObj->telefono = $row['telefono'];
            $rowObj->email = $row['email'];
            $rowObj->fecha_inscripcion = $row['fecha_inscripcion'];

            array_push($return_data, $rowObj);
        }

        echo json_encode($return_data);

    } else {
        echo 'no hay alumnos'; 
    }
