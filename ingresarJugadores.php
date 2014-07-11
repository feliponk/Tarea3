<h1 style="background-color: #0099CC">
    Agregar Jugador</h1>
<p style="background-color: #00CCFF">
    Ingrese los datos del jugador:</p>

<?php
	$idsss = $_POST['idss'];
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
	$query = pg_query("select * from jugador where id_equipo = '$idsss' ");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Jugadores</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Edad</td>
				<td class='auto-style2'>Goles totales</td>
				<td class='auto-style2'>Equipo externo</td>
				<td class='auto-style2'>Foto</td>

				
			</tr>";
	while($fila=pg_fetch_array($query)){
		$nombre = $fila['nombre'];
		$edad = $fila['edad'];
		$gol_tot = $fila['goles_totales'];
		$equipo = $fila['equipo_externo'];
		$foto = $fila['foto_jugador'];
		echo "<tr>
				<td class='auto-style2'>$nombre</td>
				<td class='auto-style2'>$edad</td>
				<td class='auto-style2'>$gol_tot</td>
				<td class='auto-style2'>$equipo</td>
				<td>
					<img src= '$foto' width='50' heigth='50' />
				</td>
			</tr>";
	}
	echo "</table>";
?>
    
    
<form action="GuardarJugador.php" method="post" class="guardar" enctype="multipart/form-data">
	
	<table class="auto-style1">
            <tr>
                <td class="auto-style2">Nombre Jugador:</td>
                <td>
                    <Input  name="nombre" type="text" >
                </td>
            </tr>
            <tr>
                <td class="auto-style2">Edad:</td>
                <td>
                    <Input name="edad" type="text">
                </td>
            </tr>
            <tr>
                <td class="auto-style2">Goles Totales:</td>
                <td>
                    <Input name="goles" type="text">
                </td>
            </tr>
            <tr>
                <td class="auto-style2">Equipo Externo:</td>
                <td>
                    <Input name="equipo" type="text">
                </td>
            </tr>
            <tr>
                <td class="auto-style2">Foto Jugador:</td>
                <td>
                    <input name="foto" type="file" id="foto">
                </td>
            </tr>
            <tr>
           		<?php
            	
               echo "<td><input name='id' type='hidden' value='$idsss'</td>"
				?>				
                <td>
                    <input name="guardar" type="submit" value="Guardar">
                </td>
            </tr>
            
        </table>
</form>
