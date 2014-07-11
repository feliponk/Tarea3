<?php
$nombre = $_POST['nombre'];
$entrenador = $_POST['entrenador'];
$pais = $_POST['pais'];
$nombrefoto = $_FILES['foto']['name'];
$ruta=$_FILES['foto']['tmp_name'];
$destino = "C:/fotos/".$nombrefoto;
copy($ruta,$destino);

$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$query=pg_query("INSERT INTO equipo(nom_equipo,entrenador,pais,foto_bandera) values('$nombre','$entrenador','$pais','$destino')");

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
