<?php
$lista= trim(strip_tags($_REQUEST["lista"]));

$ids_registros = implode(',', $_POST['lista']);

include "../conexion.php";
$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conexion) {
	die("Conexion fallida: " . mysqli_connect_error());
} else {
	$instruccion1 = "DELETE FROM nota WHERE id_not IN ($ids_registros);";
	$consulta1 = mysqli_query ($conexion,$instruccion1) or die ("Fallo en la consulta de consulta.");
	
	$consulta = mysqli_query ($conexion,$instruccion1) or die ("Fallo en la consulta de consulta.");
	
	header('Location: ../index.php');
}
?>