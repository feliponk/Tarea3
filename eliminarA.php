<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$id_area = $_POST['id_area'];
$query = pg_query("delete from areas_jim where id_area = $id_area");

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
	echo "window.location='areas.php'";
	echo "</script>";
}
?>