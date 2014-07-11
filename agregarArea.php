<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$id_area = $_POST['id_area'];
$nombre = $_POST['f_nombre'];
$campus = $_POST['campus'];
$col_estimados = $_POST['f_estimado'];
if ($nombre == "" || $col_estimados == "")
{
	echo "<script language='javascript'>";
	echo "alert('Dejo espacios en blancos')";
	echo "</script>";

	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
}
else {
	$query = pg_query("insert into areas_jim (campus,nombre,n_estimado_colab,n_seleccionados) values('$campus','$nombre',$col_estimados,0)");

	if (!$query)
	{
		echo "<script language='javascript'>";
		echo "alert('Error al guardar los datos, intentelo de nuevo')";
		echo "</script>";

		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
	}
	else {
		echo "<script language='javascript'>";
		echo "alert('Datos guardados con exito')";
		echo "</script>";

		echo "<script language='javascript'>";
		echo "window.location='menuCoor.php'";
		echo "</script>";
	}

}