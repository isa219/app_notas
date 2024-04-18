<?php
session_start();
$fecha_actual = date('Y-m-d');
$usuario = $_SESSION['usuario'];
if ($_SESSION['loggin'] == true) {
	echo "<html>";
	echo "<head>";
	echo "<link rel='stylesheet' href='../css/styles.css'>";
	echo "<meta charset='UTF-8'>";
	echo "</head>";
	echo "<body>";
	echo "<div id='menu_app'><span id='logo'><a href='../index.php'>AppNotas</a></span><span id='fecha'>$fecha_actual</span><span id='crear_nota'><a href='./añadir_nota.php'>Crear Nota</a></span><span id='crear_categoria'><a href='./crear_cat.php'>Crear Categoria</a></span><span class='borrar_categoria'><a href='../eliminacion/borrar_cat.php'>Borrar Categoria</a></span><span id='usuario'>$usuario</span><span id='cerrar_sesion'><a href='logout.php'>Cerrar Sesion</a></span></div>";
	echo "<form action='./añadir_cat.php' method='POST'>";
	echo "<span id='formulariot_titulo_cat'>Título de la categoría</span>";
	echo "<input type='text' id='formulario_titulo_cat' name='categoria'>";
	echo "<input type='submit' value='Crear' id='formulario_boton_cat'>";
	echo "</form>";
	echo "</body>";
	echo "</html>";
} else {
	header('Location: ./login.html');
}
?>