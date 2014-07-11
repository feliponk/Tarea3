<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$id_noticia = $_POST['id_noticia'];
$query2 = pg_query("delete from noticias where id_noticia = $id_noticia ");

if (!$query2)
{
	echo "<script language='javascript'>";
	echo "alert('Error al eliminar los datos en tabla coor_areas')";
	echo "</script>";

	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
}
else {
	echo "<script language='javascript'>";
	echo "alert('Datos borrados con exito')";
	echo "</script>";

	echo "<script language='javascript'>";
	echo "window.location='noticias.php'";
	echo "</script>";
}

?>