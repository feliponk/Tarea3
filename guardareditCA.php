<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$nombre = $_POST['f_nombre'];
$campus = $_POST['campus'];
$id_dato = $_POST['id_dato'];
$rol = $_POST['f_rol'];
$rut = $_POST['f_rut'];
$id_area = $_POST['f_area'];
$telefono = $_POST['f_telefono'];
$talla = $_POST['f_talla'];
$carrera = $_POST['f_carrera'];
$correo = $_POST['f_correo'];


$cont = 0;
$query7 = pg_query("select count(*) from coor_areas where area = $id_area");
$fila2 = pg_fetch_array($query7);
$max = $fila2['count'];
if ($max == 3)
{
	echo "<script language='javascript'>";
	echo "alert('Se exedio el maximo de coordinadores para esta area, intente en otra')";
	echo "</script>";

	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
	$cont++;
}

if ($nombre == "" || $rol == "" || $rut == "" || $telefono == "" || $carrera == "" || $correo == "")
{
	echo "<script language='javascript'>";
	echo "alert('Ha dejado espacios en blanco')";
	echo "</script>";

	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
	$cont++;
}


if ($cont == 0)
{
	$query4 = pg_query("update datos set rol = '$rol' ,campus = '$campus',carrera = '$carrera',rut = '$rut',nombre = '$nombre',email = '$correo',telefono = $telefono,talla_polera = '$talla' where id_dato = $id_dato");
	if (!$query4)
	{
		echo "<script language='javascript'>";
		echo "alert('error al guardar los datos')";
		echo "</script>";

		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
	}
	else
	{
		
		$query6 = pg_query("update coor_areas set area= $id_area where id_dato = $id_dato");
		if (!$query6)
		{
			echo "<script language='javascript'>";
			echo "alert('error al actualizar los datos en tabla coor_areas')";
			echo "</script>";

			echo "<script type='text/javascript'>";
			echo "window.history.back(-1)";
			echo "</script>";
		}
		else
		{
			echo "<script language='javascript'>";
			echo "alert('Datos guardados con exito')";
			echo "</script>";

			echo "<script language='javascript'>";
			echo "window.location='coorAreas.php'";
			echo "</script>";
		}

	}
}