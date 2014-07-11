<h1 style="background-color: #0099CC">
    Partidos</h1>
<p style="background-color: #00CCFF">
    Partidos realizados:</p>

<?php
	
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
	$query = pg_query("select * from vista_partidosjugados");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Partidos jugados</td>
				<td class='auto-style2'>Fecha</td>
				<td class='auto-style2'>Ganador</td>
				<td class='auto-style2'>Tiempo extra</td>
				<td class='auto-style2'>Lugar</td>
				
			</tr>";
	while($fila=pg_fetch_array($query)){
		$fecha = $fila['fecha'];
		$ganador = $fila['ganador'];
		$t_ex = $fila['tiempo_extra'];
		$lugar = $fila['lugar'];
		
		echo "<tr>
		<td class='auto-style2'>$fecha</td>
		<td class='auto-style2'>$ganador</td>
		<td class='auto-style2'>$t_ex</td>
		<td class='auto-style2'>$lugar</td>
		</tr>";
	}
	echo "</table>";
	$query2 = pg_query("select * from vista_partidospendientes");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Partidos pendientes</td>
				<td class='auto-style2'>Fecha</td>
				<td class='auto-style2'>Ganador</td>
				<td class='auto-style2'>Tiempo extra</td>
				<td class='auto-style2'>Lugar</td>
	
			</tr>";
	while($fila=pg_fetch_array($query2)){
		$fecha1 = $fila['fecha'];
		$ganador1 = $fila['ganador'];
		$t_ex1 = $fila['tiempo_extra'];
		$lugar1 = $fila['lugar'];
		$idpartido = $fila['id_partido'];
	
		echo "<tr>
		<td class='auto-style2'>$fecha1</td>
		<td class='auto-style2'>$ganador1</td>
		<td class='auto-style2'>$t_ex1</td>
		<td class='auto-style2'>$lugar1</td>
		<td><form action='' method='post' class='terminar' enctype='multipart/form-data'>
						<input name='fecha' type ='Hidden' value='$fecha1'>
						<input name='ganador' type ='Hidden' value='$ganador1'>
						<input name='tiempo' type ='Hidden' value='$t_ex1'>
						<input name='lugar' type ='Hidden' value='$lugar1'>
						<input name='id' type ='Hidden' value='$idpartido'>
						<Input name='terminar' type='submit' value='Terminar'>
					</form>
		</td>
		</tr>";
	}
	echo "</table>";
?>
<?php

$fecha2 = $_POST['fecha'];
$ganador2 = $_POST['ganador'];
$tiempo= $_POST['tiempo'];
$lugar2=$_POST['lugar'];
$idp = $_POST['id'];
echo "<form  method='post'  enctype='multipart/form-data'>
	
	<table class='auto-style1'>
            <tr>
                <td class='auto-style2'>Fecha:</td>
                <td>
                    <Input  name='fecha' type='text' value = '$fecha2'>
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Ganador:</td>
                <td>
                    <Input name='ganador' type='text' >
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Tiempo extra:</td>
                <td>
                	<input name='tiempo' type='text' >
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Lugar:</td>
                <td>
                    <input name='lugar' type='text' value = '$lugar2'>
                    <input name = 'ide' type='hidden' value='$idp'>
                </td>"
            ?>
            </tr>
            <tr>
                <td>
                	<input type="submit" onclick= "this.form.action ='guardarPartido.php'" value='Terminar'>
                	
                </td>
            </tr>
            
        </table>
</form>


<form  method='post'  enctype='multipart/form-data'>
	
	<table class='auto-style1'>
            <tr>
                <td class='auto-style2'>Fecha:</td>
                <td>
                    <Input  name='fecha' type='text' >
                </td>
                <td class='auto-style2'>aaaa-mm-dd</td>
            </tr>
            <tr>
                
                <td>
                    <Input name='ganador' type='hidden' value = '/' >
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Equipo 1:</td>
                <td>
                    <Input name='e1' type='text' >
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Equipo 2:</td>
                <td>
                    <Input name='e2' type='text' >
                </td>
            </tr>
            <tr>
                
                <td>
                	<input name='tiempo' type='hidden' value ='0' >
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Lugar:</td>
                <td>
                    
                    <input name = 'ide' type='hidden' value='$idp'>
                    <input name = 'lugar' type = 'text' >
                </td>
			</tr>
            <tr>
                <td>
                	<input type="submit" onclick= "this.form.action ='NguardarPartido.php'" value='Guardar'>
                	
                </td>
            </tr>
            
        </table>
</form>