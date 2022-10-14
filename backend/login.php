<?php
    include '../config/database_config.php'; 

    $responseObj = new stdClass();

    $username = $_POST['username'];
    $password = $_POST['password']; 
    $query = "SELECT usuario, contraseña, tipo_usuario FROM usuarios WHERE usuario = '".$username."'";

    $result = $con->query($query);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($password == $row['contraseña']) {
                $responseObj->statusCode = 200;
                $responseObj->msj = 'Exito';
                $responseObj->tipo_usuario = $row['tipo_usuario']; // aqui le agregamos el rol de usuario desde la DB
            } else {
                $responseObj->statusCode = 403;
                $responseObj->msj = 'Usuario y/o contraseña incorrectos';
            }
        }
    } else {
        $responseObj -> statusCode = 403;
        $responseObj -> msj = 'No existe el usuario';
    }

    echo json_encode($responseObj);

?>