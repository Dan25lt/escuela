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


//Funcion para validar la edad
function validar_edad($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $fecha_actual =  new DateTime(date("y-m-d"));
    $edad_actual = $fecha_actual ->diff($nacimiento);
    return $edad_actual ->format("%y");
}
//Se verifica que la edad sea de 6 años y menor de 13
if(validar_edad($fecha_nacimiento) >= 13)
{
  echo "El candidato sobrepasa la edad";
}
else
{
    if(validar_edad($fecha_nacimiento) < 6)
{
  echo "El candidato no tiene la edad suficiente";// si no es suficiente manda este mensaje de error
}
else
{

    //Se evalua que el agrado este dentro de los limites de 1 a 6
    if($grado > 0 && $grado < 7 ){

        $query = "SELECT * FROM alumnos WHERE nombre = '$nombre' AND apellido_paterno = '$apellido_paterno' AND apellido_materno = '$apellido_materno'";
        $result = mysqli_query($con , $query);    

        //Se evalua si se cuenta con resgistros del mismo alumno, para evitar duplicidades
        if (mysqli_num_rows($result) >0) {
            echo "Registro Duplicado";
        } else {
            echo "Se guardo" ;
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
                echo "el año de inscripcion es no valido";
            }
        }
    }
    else{
        echo "el año de inscripcion es no valido";
    }

}

}
