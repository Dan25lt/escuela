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



function validar_edad($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $fecha_actual =  new DateTime(date("y-m-d"));
    $edad_actual = $fecha_actual ->diff($nacimiento);
    return $edad_actual ->format("%y");
}

if(validar_edad($fecha_nacimiento) < 6)
{
  echo "El candidato no tiene la edad suficiente";
}
else
{
    if($grado >= 1 && $grado <= 6 ){
        $query = "SELECT * FROM alumnos WHERE nombre = '$nombre' AND apellido_paterno = '$apellido_paterno' AND apellido_materno = '$apellido_materno' AND curp = ' $curp' ";
        $result = mysqli_query($con , $query);
    
        if (mysqli_num_rows($result) >0) {
            echo "Registro Duplicado";
        } else {
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
                echo "Registro insertado";
            } else {
                echo "Error: " . $query . "<br>" . $con->error;
            }
        }
    }
    else{
        echo "el año de inscripcion es no valido";
    }

}
    
  
?>