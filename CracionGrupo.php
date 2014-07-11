<?php
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
	$query = pg_query("select count(*) from equipo");
	$query2 = pg_query("select id_equipo from equipo order by id_equipo DESC limit 1");
	$fila= pg_fetch_array($query);
	$fila2= pg_fetch_array($query2);
	$idmax = $fila2['id_equipo'];
	$cont = $fila['count'];
	$aux = 1;
	$cantidad=0;
	$idgrupo=1;
	

	if($cont < 32){
?>
	<script language="javascript" type="text/javascript"> 
		function msgbox(mensaje) {
            alert(mensaje);
    							}; 
    </script>
<?php
		echo "<script>msgbox('Faltan grupos por ingreas');</script>";
		header('Refresh: 1; URL=MenuAdmi.php');
		
	}
	else{
		echo "<form action='asignarGrupo.php' method='post' class='Crear Grupo' enctype='multipart/form-data'>
				<input name='Crear Grupo' type='submit' value = 'Crear Grupo' ";
		
	}
?>