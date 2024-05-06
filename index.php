<?php
session_start();
$fecha_actual = date('Y-m-d');
$usuario = $_SESSION['usuario'];
$mi_usuario=$_SESSION['id'];
if ($_SESSION['loggin'] == true) {
	echo "<html>";
	echo "<head>";
	echo "<link rel='stylesheet' href='css/styles.css'>";
	echo "<meta charset='UTF-8'>";
	echo "</head>";
	echo "<body>";
	echo "<div id='menu_app'><span id='logo'><a href='./index.php'>AppNotas</a></span><span id='fecha'>$fecha_actual</span><span id='crear_nota'><a href='./creacion/añadir_nota.php'>Crear Nota</a></span><span id='crear_categoria'><a href='./creacion/crear_cat.php'>Crear Categoria</a></span><span class='borrar_categoria'><a href='./eliminacion/borrar_cat.php'>Borrar Categoria</a></span><span id='usuario'>$usuario</span><span id='cerrar_sesion'><a href='logout.php'>Cerrar Sesion</a></span></div>";
	
include "./conexion.php";
$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conexion) {
	die("Conexion fallida: " . mysqli_connect_error());
} else {
	$instruccion1 = "SELECT nota.id_not,nota.fec_not,nota.tit_not,nota.tex_not,usuario.nam_usu,categoria.tit_cat FROM nota,categoria,usuario WHERE nota.id_cat = categoria.id_cat AND nota.id_usu=usuario.id_usu AND nota.id_usu=$mi_usuario;";
	$consulta1 = mysqli_query ($conexion,$instruccion1) or die ("Fallo en la consulta de consulta.");
	
		
		// Mostrar resultados de la consulta
	$nfilas = mysqli_num_rows ($consulta1);
	if ($nfilas >= 1) {
		echo "<form action='eliminacion/eliminar_not.php' method='POST'>";
		for ($i=0; $i<$nfilas; $i++) {
			$resultado = mysqli_fetch_array ($consulta1);
			echo "<div class='caja_nota'>";
			echo "<span class='fecha_nota'>" . $resultado['fec_not'] . "</span>";
			echo "<span class='titulonota'>" . $resultado['tit_not'] . "</span>";
			echo "<div class='caja_categoria'>" . $resultado['tit_cat'] . "</div>";
			echo "<div class='caja_texto'>" . $resultado['tex_not'] . "</div>";
			echo "<input type='checkbox' class='check_not' name='lista[]' value='" . $resultado['id_not'] . "'>";
			echo "</div>";
		}
		echo "<input type='submit' value='Eliminar' id='eliminar_nota'>";
		echo "</form>";
	}
}
	echo "</body>";
	echo "</html>";
} else {
	header('Location: ./login.html');
}
?>