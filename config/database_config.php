<?php
// Se declaran las constantes
const DB_HOST = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "1357loCK";
const DB_DATABASE_NAME = "escuela";
//Se guardan en una variable todos los datos de coneccion mandandolos atravez de una funcion mysql_connect
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
//Se verifica si hay error en la conexion, y si esto sucede la cierra
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}

?>