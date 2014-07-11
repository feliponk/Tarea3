<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$nombre = $_POST['f_nombre'];
$campus = $_POST['campus'];
$rol = $_POST['f_rol'];
$rut = $_POST['f_rut'];
$id_area = $_POST['f_area'];
$telefono = $_POST['f_telefono'];
$talla = $_POST['f_talla'];
$carrera = $_POST['f_carrera'];
$correo = $_POST['f_correo'];
$pass = $_POST['f_pass'];


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

if ($nombre == "" || $rol == "" || $rut == "" || $telefono == "" || $carrera == "" || $correo == "" || $pass == "")
{
	echo "<script language='javascript'>";
	echo "alert('Ha dejado espacios en blanco')";
	echo "</script>";
	
	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
	$cont++;
}
$query = pg_query("SELECT * FROM datos WHERE email = '$email'");
$count = pg_num_rows($query);
if ($count == 1)
{
	echo "<script language='javascript'>";
	echo "alert('email ya registrado')";
	echo "</script>";
		
	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
	$cont++;
}

$query2 = pg_query("SELECT * FROM datos WHERE rol = '$rol' ");
$count = pg_num_rows($query2);

if ($count == 1)
{
	echo "<script language='javascript'>";
	echo "alert('rol ya registrado')";
	echo "</script>";

	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
	$cont++;
}
$query3 = pg_query("SELECT * FROM datos WHERE rut = '$rut'");
$count = pg_num_rows($query3);

if ($count == 1)
{
	echo "<script language='javascript'>";
	echo "alert('rut ya registrado')";
	echo "</script>";

	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
	$cont++;
}


if ($cont == 0)
{
	$query4 = pg_query("insert into datos (rol,campus,carrera,rut,nombre,pass,email,telefono,talla_polera) values('$rol','$campus','$carrera','$rut','$nombre','$pass','$correo','$telefono','$talla')");
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
		$query5 = pg_query("select * from datos where email = '$correo'");
		while($fila = pg_fetch_array($query5))
		{
			$idato = $fila['id_dato'];
		}
		$query6 = pg_query("insert into coor_areas (id_dato,area) values($idato, $id_area)");
		if (!$query6)
		{
			echo "<script language='javascript'>";
			echo "alert('error al guardar los datos en tabla coor_areas')";
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








