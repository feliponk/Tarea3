<?php
$fecha = $_POST['fecha'];
$ganador = $_POST['ganador'];
$e1 = $_POST['e1'];
$e2 = $_POST['e2'];
$t_ext = $_POST['tiempo'];
$lugar = $_POST['lugar'];
$id = $_POST['ide'];


$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$query= $query=pg_query("insert into partido(fecha,id_e1,id_e2,n_ganador,tiempo_extra,nombre_estadio) values('$fecha','$e1','$e2','$ganador','$t_ext','$lugar')");

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
	echo "<script>msgbox('Equipo ingresado con exito');</script>";
	header('Refresh: 1; URL=MenuAdmi.php');
	

}


?>
