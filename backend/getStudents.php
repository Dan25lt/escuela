<?php
    include '../config/database_config.php'; 

    $return_data = array();
    
    class rowObject
    {
        public $idordenDeServicio;
        public $fechaEntrada;
        public $fechaSalida;
    }

    $query = "SELECT n.nombre, 
                    p.apellido_paterno,
                    m.apellido_materno,
                    f.fecha_nacimiento,
                    c.curp,
                    o.fechaSalida,
                    o.estatus,
                    o.alertas
                FROM alumnos 

    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $rowObj = new rowObject();
            $rowObj->idordenDeServicio = $row['idordenDeServicio'];
            $rowObj->vin = $row['vin'];
            $rowObj->modelo = $row['modelo'];
            $rowObj->placas = $row['placas'];
            $rowObj->fechaEntrada = $row['fechaEntrada'];
            $rowObj->fechaSalida = $row['fechaSalida'];
            $rowObj->estatus = $row['estatus'];
            $rowObj->alertas = $row['alertas'];

            array_push($return_data, $rowObj);
        }

        echo json_encode($return_data);

    } else {
        echo 'no hay alumnos'; 
    }

?>