<?php

$email= trim(strip_tags($_REQUEST["email"]));
$password= trim(strip_tags($_REQUEST["password"]));

$nueva_password = password_hash($password, PASSWORD_DEFAULT);

include "conexion.php";
$conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	if (!$conexion) {
		die("Conexion fallida: " . mysqli_connect_error());
	} else {
		$instruccion = "SELECT * FROM usuario WHERE ema_usu LIKE '$email';";
		$consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en la consulta de consulta.");
		$nfilas = mysqli_num_rows ($consulta);
		if ($nfilas > 0) {
			$resultado = mysqli_fetch_array ($consulta);
			
			if (password_verify($password, $resultado['pas_usu'])) {
				
				session_start();
				$_SESSION['loggin'] = true;
				$_SESSION['usuario'] = $resultado['nam_usu'];
				$_SESSION['id'] = $resultado['id_usu'];
				header('Location: ./index.php');
				
			} else {
				echo 'La contraseña es incorrecta.';
			}
		} else {
			echo "<script>";
			echo "alert('Datos incorrectos al intentar iniciar sesion');";
			echo "window.history.go(-1);"; // Redirige hacia atrás en la historia del navegador
			echo "</script>";
		}
	}

$nueva_password = password_verify($password, PASSWORD_DEFAULT);

?>