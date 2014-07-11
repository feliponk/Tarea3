<?php
$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$nombre = $_POST['f_nombre'];
$campus = $_POST['campus'];
$rol = $_POST['f_rol'];
$rut = $_POST['f_rut'];
$id_area1 = $_POST['f_area1'];
$id_area2 = $_POST['f_area2'];
$id_area3 = $_POST['f_area3'];
$telefono = $_POST['f_telefono'];
$talla = $_POST['f_talla'];
$carrera = $_POST['f_carrera'];
$correo = $_POST['f_correo'];
$pass = $_POST['f_pass'];



$cont = 0;


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

if ($id_area1 == $id_area2 || $id_area1 == $id_area3)
{
	echo "<script language='javascript'>";
	echo "alert('Ha repetido areas de postulacion')";
	echo "</script>";
	
	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
	$cont++;
}
if ($id_area2 != "" and $id_area3 != "")
{
	if ($id_area2 == $id_area3)
	{
		echo "<script language='javascript'>";
		echo "alert('Ha repetido areas de postulacion')";
		echo "</script>";
		
		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
		$cont++;
	}
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
		if ($id_area2 == "" and $id_area3 == "")
		{
			$query6 = pg_query("insert into postulantes (id_dato,pref1,selec1,selec2,selec3) values($idato, $id_area1,0,0,0)");
			if (!$query6)
			{
			echo "<script language='javascript'>";
			echo "alert('error al guardar los datos en tabla postulantes')";
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
			echo "window.location='login2.php'";
			echo "</script>";
			}
		}
		elseif($id_area2 == "" and $id_area3 != "")
		{
			$query7 = pg_query("insert into postulantes (id_dato,pref1,pref3,selec1,selec2,selec3) values($idato, $id_area1,$id_area3,0,0,0)");
			if (!$query7)
			{
				echo "<script language='javascript'>";
				echo "alert('error al guardar los datos en tabla postulantes1')";
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
				echo "window.location='login2.php'";
				echo "</script>";
			}
		}
		elseif ($id_area2 != "" and $id_area3 == "")
		{
			$query8 = pg_query("insert into postulantes (id_dato,pref1,pref2,selec1,selec2,selec3) values($idato, $id_area1,$id_area2,0,0,0)");
			if (!$query8)
			{
				echo "<script language='javascript'>";
				echo "alert('error al guardar los datos en tabla postulantes2')";
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
				echo "window.location='login2.php'";
				echo "</script>";
			}
		}
		else
		{
			$query9 = pg_query("insert into postulantes (id_dato,pref1,pref2,pref3,selec1,selec2,selec3) values($idato, $id_area1,$id_area2,$id_area3,0,0,0)");
			if (!$query9)
			{
				echo "<script language='javascript'>";
				echo "alert('error al guardar los datos en tabla postulantes3')";
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
				echo "window.location='login2.php'";
				echo "</script>";
			}
		}
	
	}
}
