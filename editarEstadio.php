<?php

$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$capacidad = $_POST['capacidad'];
$descripcion = $_POST['descripcion'];
$nombrefoto = $_FILES['foto']['name'];
$ruta=$_FILES['foto']['tmp_name'];
$destino = "C:/fotos/".$nombrefoto;
copy($ruta,$destino);

$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
if($nombrefoto != "")
{
	$query=pg_query("update estadio set nombre='$nombre', ciudad='$ciudad',direccion='$direccion', capacidad='$capacidad', descripcion= '$descripcion', foto = '$destino' where nombre = '$nombre'");
}
else {
	
	$query=pg_query("update estadio set nombre='$nombre', ciudad='$ciudad',direccion='$direccion', capacidad='$capacidad', descripcion= '$descripcion' where nombre = '$nombre'");
	
}


if(!$query)
{
	echo 'Error al guardar los datos intentelo de nuevo';

}
else {
	?>
		<script language="javascript" type="text/javascript"> 
			function msgbox(mensaje) {
            	alert(mensaje);
    							}; 
		
		</script>
	<?php
	echo "<script>msgbox('Estadio editado con exito');</script>";
	header('Refresh: 1; URL=MenuAdmi.php');
	

}


?>
