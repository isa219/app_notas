<?php
session_start();
$fecha_actual = date('Y-m-d');
$usuario = $_SESSION['usuario'];
$id = $_SESSION['id'];
if ($_SESSION['loggin'] == true) {
	echo "<html>";
	echo "<head>";
	echo "<link rel='stylesheet' href='../css/styles.css'>";
	echo "<meta charset='UTF-8'>";
	echo "</head>";
	echo "<body>";
	echo "<div id='menu_app'><span id='logo'><a href='../index.php'>AppNotas</a></span><span id='fecha'>$fecha_actual</span><span id='crear_nota'><a href='./añadir_nota.php'>Crear Nota</a></span><span id='crear_categoria'><a href='./crear_cat.php'>Crear Categoria</a></span><span class='borrar_categoria'><a href='../eliminacion/borrar_cat.php'>Borrar Categoria</a></span><span id='usuario'>$usuario</span><span id='cerrar_sesion'><a href='logout.php'>Cerrar Sesion</a></span></div>";
	echo "<form action='./crear_nota.php' method='POST'>";
	echo "<span id='formulariot_titulo_nota'>Título</span>";
	echo "<input type='text' id='formulario_titulo_nota' name='titulo'>";
	echo "<input type='hidden' name='id_usuario' value='$id'>";
	echo "<span id='formulariot_area_nota'>Texto</span>";
	echo "<span id='formulariot_categoria_nota'>Categoría</span>";
	echo "<select id='formulario_categoria_nota' name='categoria'>";
	
	
	
	include "../conexion.php";
$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conexion) {
		die("Conexion fallida: " . mysqli_connect_error());
	} else {
		$instruccion1 = "SELECT * FROM categoria;";
		$consulta1 = mysqli_query ($conexion,$instruccion1) or die ("Fallo en la consulta de consulta.");
		
		// Mostrar resultados de la consulta
		$nfilas = mysqli_num_rows ($consulta1);
		if ($nfilas >= 1) {
			for ($i=0; $i<$nfilas; $i++) {
				$resultado = mysqli_fetch_array ($consulta1);
				echo "<option value=" . $resultado['id_cat'] . ">" . $resultado['tit_cat'] . "</option>";
			}
			
		}
}


	echo "</select>";
	echo "<textarea id='formulario_area_nota' name='nota'></textarea>";
	echo "<input type='submit' value='Crear' id='formulario_boton_nota'>";
	echo "</form>";
	echo "</body>";
	echo "</html>";
} else {
	header('Location: ./login.html');
}
?>