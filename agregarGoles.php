<?php
$goles = $_POST['n_goles'];
$jugador = $_POST['jugador'];
$idPartido = $_POST['idp'];


$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$query= $query=pg_query("insert into goles(id_partido,id_jugador,goles_jugador) values('$idPartido','$jugador','$goles')");

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
	echo "<script>msgbox('Gol ingresado con exito');</script>";
	header('Refresh: 1; URL=guardarPartido.php');
	

}


?>
