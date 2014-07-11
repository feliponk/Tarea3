<?php
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
	$nombre = $_POST['nombre'];
	$nombrefoto = $_FILES['foto']['name'];
	$size = $_FILES['foto']['size'];
	$ruta=$_FILES['foto']['tmp_name'];
	$destino = "C:/fotos/".$nombrefoto;
	copy($ruta,$destino);
	
	if ($size <= 1000000 and $nombrefoto != '')
	{
		pg_query("INSERT INTO fotos(nombre,foto) values('$nombrefoto','$destino')");
		
		?>
		<script language="javascript" type="text/javascript"> 
		function msgbox(mensaje) {
            alert(mensaje);
    							}; 
		
		</script>
<?php
		echo "<script>msgbox('archivo subido con exito');</script>";
		header('Refresh: 1; URL=newfile.php');
	}
	else
	{
	   echo 'archivo muy grande o erroneo, por favor intentelo de nuevo';
	}
	
	
	
?>