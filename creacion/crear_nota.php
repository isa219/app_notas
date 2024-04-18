<?php
$titulo= trim(strip_tags($_REQUEST["titulo"]));
$categoria= trim(strip_tags($_REQUEST["categoria"]));
$nota= nl2br(trim(strip_tags($_REQUEST["nota"])));
$id_usuario= trim(strip_tags($_REQUEST["id_usuario"]));

include "../conexion.php";
$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conexion) {
		die("Conexion fallida: " . mysqli_connect_error());
	} else {
		$instruccion = "INSERT INTO nota (fec_not,tit_not,tex_not,id_usu,id_cat) VALUES (now(),'$titulo','$nota',$id_usuario,$categoria);";
		$consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en la consulta de consulta.");
		$nfilas = mysqli_num_rows ($consulta);
		if ($nfilas == 0) {
			echo "<script>";
			echo "window.history.go(-1);"; // Redirige hacia atrás en la historia del navegador
			echo "</script>";
		}
	}
?>