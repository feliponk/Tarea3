<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$id_dato = $_POST['id_dato'];
$query2 = pg_query("delete from coor_areas where id_dato = $id_dato ");

if (!$query2)
{
	echo "<script language='javascript'>";
	echo "alert('Error al eliminar los datos en tabla coor_areas')";
	echo "</script>";

	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
}

$query = pg_query("delete from datos where id_dato = $id_dato ");



if (!$query)
{
	echo "<script language='javascript'>";
	echo "alert('Error al eliminar los datos')";
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
	echo "window.location='coorAreas.php'";
	echo "</script>";
}
?>