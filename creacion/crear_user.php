<?php
$username= trim(strip_tags($_REQUEST["username"]));
$name= trim(strip_tags($_REQUEST["name"]));
$email= trim(strip_tags($_REQUEST["email"]));
$password= trim(strip_tags($_REQUEST["password"]));

$nueva_password = password_hash($password, PASSWORD_DEFAULT);

if ($name == "" ) {
	echo "<script>";
	echo "alert('No has introducido un Nombre');";
	echo "window.history.go(-1);"; // Redirige hacia atrás en la historia del navegador
	echo "</script>";
} elseif ($email == "" ) {
	echo "<script>";
	echo "alert('No has introducido un Correo electronico');";
	echo "window.history.go(-1);"; // Redirige hacia atrás en la historia del navegador
	echo "</script>";
} elseif ($password == "" ) {
	echo "<script>";
	echo "alert('No has introducido una contraseña');";
	echo "window.history.go(-1);"; // Redirige hacia atrás en la historia del navegador
	echo "</script>";
} else {
	
	include "../conexion.php";
	
	$conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	if (!$conexion) {
		die("Conexion fallida: " . mysqli_connect_error());
	} else {
		$instruccion = "INSERT INTO usuario (nam_usu,ema_usu,pas_usu) VALUES ('$name','$email','$nueva_password');";
		$consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en la consulta.");
		$nfilas = mysqli_num_rows ($consulta);
		if ($nfilas > 0) {
			echo "<script>";
			echo "alert('Error');";
			echo "</script>";
		} else {
			header('Location: ./login.html');
		}
	}
}

?>