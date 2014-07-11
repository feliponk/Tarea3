<h1 style="background-color: #0099CC">
    Grupos</h1>
<p style="background-color: #00CCFF">
    Grupos y sus repectivos equipos:</p>
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
	
	
	while($aux <= $idmax){
		$query3 = pg_query("update equipo set id_grupo = '$idgrupo' where id_equipo='$aux'");
		$aux++;
	
		if(!query3){
			$aux =  $aux;
		}
		else {
			if ($cantidad==4){
				$idgrupo++;
			}
			if ($cantidad==8){
				$idgrupo++;
			}
			if ($cantidad==12){
				$idgrupo=5;
			}
			if ($cantidad==16){
				$idgrupo++;
			}
			if ($cantidad==20){
				$idgrupo++;
			}
			if ($cantidad==24){
				$idgrupo++;
			}
			if ($cantidad==28){
				$idgrupo++;
			}
			if ($cantidad==32){
				break;
			}
			$cantidad++;
		}
	
	
	
	
	}
	$query4 = pg_query("select * from equipo where id_grupo = '1' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo A</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query4)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
	$query5 = pg_query("select * from equipo where id_grupo = '2' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo B</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query5)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
	$query6 = pg_query("select * from equipo where id_grupo = '3' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo C</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query6)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
	$query7 = pg_query("select * from equipo where id_grupo = '5' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo D</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query7)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
	$query8 = pg_query("select * from equipo where id_grupo = '6' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo E</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query8)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
	$query9 = pg_query("select * from equipo where id_grupo = '7' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo F</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query9)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
	$query10 = pg_query("select * from equipo where id_grupo = '8' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo G</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query10)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
	$query11 = pg_query("select * from equipo where id_grupo = '9' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Grupo H</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Foto</td>
	
			</tr>";
	while($fila=pg_fetch_array($query11)){
		$nombre = $fila['nom_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
		<td class='auto-style2'>$nombre</td>
		<td>
		<img src= '$foto' width='50' heigth='50' />
		</td>
		</tr>";
	}
	echo "</table>";
?>