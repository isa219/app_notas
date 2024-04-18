<?php
$categoria= trim(strip_tags($_REQUEST["categoria"]));

include "../conexion.php";
$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conexion) {
		die("Conexion fallida: " . mysqli_connect_error());
	} else {
		$instruccion = "INSERT INTO categoria (tit_cat) VALUES ('$categoria');";
		$consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en la consulta de consulta.");
		$nfilas = mysqli_num_rows ($consulta);
		if ($nfilas == 0) {
			echo "<script>";
			echo "window.history.go(-1);"; // Redirige hacia atrás en la historia del navegador
			echo "</script>";
		}
	}
?>