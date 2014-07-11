<form action="subir.php" method="post" class="subir" enctype="multipart/form-data">
<div><label>nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="nombre" type="text" ></div> 
    <div><label>Foto:&nbsp;&nbsp;</label><input name="foto" type="file" id="foto"></div> 
    <div><input name="subir" type="submit" value="subir"></div>
</form> 
<?php
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());;
	$re = pg_query("SELECT * FROM fotos");
	while ($f= pg_fetch_array($re)){
		echo $f['nombre'].'<br>';
		echo '<img src="'.$f['foto'].'" width="100" heigth="100" />';
	}
	
?>
