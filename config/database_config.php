<?php
// Se declaran las constantes
const DB_HOST = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "1357loCK";
const DB_DATABASE_NAME = "escuela";

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}

?>