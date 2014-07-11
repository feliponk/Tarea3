<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$titular = $_POST['f_titular'];
$cuerpo = $_POST['f_cuerpo'];
$id_area = $_POST['f_area'];
$dia = $_POST['f_dia'];
$mes = $_POST['f_mes'];
$ano = $_POST['f_ano'];
$fecha = "$dia-$mes-$ano";
if ($titular == "" || $cuerpo == "" )
{
	echo "<script language='javascript'>";
	echo "alert('Dejo espacios en blancos')";
	echo "</script>";
	
	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
}
else 
{
	$query = pg_query("insert into noticias (id_area,titular,contenido,fecha) values($id_area, '$titular', '$cuerpo','$fecha')");
	if (!$query)
	{
		echo "<script language='javascript'>";
		echo "alert('Error al guardar los datos')";
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
		echo "window.location='noticias2.php'";
		echo "</script>";
	}
}
