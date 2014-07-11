<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());

$id_dato = $_POST['id_dato'];
$id_area = $_POST['id_area'];
$prioridad = $_POST['prioridad'];
if ($prioridad == 1)
{
	$query = pg_query("update postulantes set selec1 = 1 where id_dato = $id_dato");
	if (!$query)
	{
		echo "<script language='javascript'>";
		echo "alert('Error al actualizar los datos')";
		echo "</script>";
			
		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
	}
	else {
		echo "<script language='javascript'>";
		echo "alert('Datos actualizados con exito')";
		echo "</script>";
		
		echo "<script language='javascript'>";
		echo "window.location='postulantes.php'";
		echo "</script>";
	}
}
elseif ($prioridad == 2)
{
	$query = pg_query("update postulantes set selec2 = 1 where id_dato = $id_dato");
	if (!$query)
	{
		echo "<script language='javascript'>";
		echo "alert('Error al actualizar los datos')";
		echo "</script>";
			
		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
	}
	else {
		echo "<script language='javascript'>";
		echo "alert('Datos actualizados con exito')";
		echo "</script>";
	
		echo "<script language='javascript'>";
		echo "window.location='postulantes.php'";
		echo "</script>";
	}
}
else 
{
	$query = pg_query("update postulantes set selec3 = 1 where id_dato = $id_dato");
	if (!$query)
	{
		echo "<script language='javascript'>";
		echo "alert('Error al actualizar los datos')";
		echo "</script>";
			
		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
	}
	else {
		echo "<script language='javascript'>";
		echo "alert('Datos actualizados con exito')";
		echo "</script>";
	
		echo "<script language='javascript'>";
		echo "window.location='postulantes.php'";
		echo "</script>";
	}
}