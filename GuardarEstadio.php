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
$query=pg_query("INSERT INTO estadio(nombre,ciudad,direccion,capacidad,descripcion,foto) values('$nombre','$ciudad','$direccion','$capacidad','$descripcion','$destino')");

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
	echo "<script>msgbox('Estadio ingresado con exito');</script>";
	header('Refresh: 1; URL=MenuAdmi.php');

}


?>