<?php
    include '../config/database_config.php'; 

    $return_data = array();

    $query = "SELECT idalumnos, CONCAT(nombre, ' ' , apellido_paterno, ' ', apellido_materno) as nombre_completo,
                email,
                fecha_inscripcion,
                grado,
                estado
            FROM alumnos
            WHERE estatus_alumno = 'inscrito'";

    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $rowObj = new stdClass();

            $rowObj->idalumnos = $row['idalumnos'];
            $rowObj->nombre_completo = $row['nombre_completo'];
            $rowObj->email = $row['email'];
            $rowObj->fecha_inscripcion = $row['fecha_inscripcion'];
            $rowObj->grado = $row['grado'];
            $rowObj->estado = $row['estado'];

            array_push($return_data, $rowObj);
        }

        echo json_encode($return_data);

    } else {
        echo 'no hay alumnos'; 
    }

?>