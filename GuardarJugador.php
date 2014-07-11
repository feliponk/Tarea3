<?php
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$goles = $_POST['goles'];
$capacidad = $_POST['capacidad'];
$equipo = $_POST['equipo'];
$idequipo = $_POST['id'];
$nombrefoto = $_FILES['foto']['name'];
$ruta=$_FILES['foto']['tmp_name'];
$destino = "C:/fotos/".$nombrefoto;
copy($ruta,$destino);

$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$query=pg_query("INSERT INTO jugador(nombre,edad,goles_totales,equipo_externo,id_equipo,foto_jugador) values('$nombre','$edad','$goles','$equipo','$idequipo','$destino')");

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
	echo "<script>msgbox('Jugador ingresado con exito');</script>";
	header('Refresh: 1; URL=MenuAdmi.php');

}


?>
