<h1 style="background-color: #0099CC">
    Gestionar Equipo</h1>
<p style="background-color: #00CCFF">
    Ingrese o edite los datos de lo equipos:</p>
    
<?php
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
	$query = pg_query("select * from equipo order by id_equipo");
	echo "<table border='1' class='auto-style1' >
			<tr>
				<td class='auto-style2'>Equipos</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Entrenador</td>
				<td class='auto-style2'>Pais</td>
				<td class='auto-style2'>Foto</td>
				<td class='auto-style2'>Editar</td>
				<td class='auto-style2'>Agregar Jugador</td>
				
			</tr>";
	while($fila=pg_fetch_array($query)){
		$nombre = $fila['nom_equipo'];
		$entrenador = $fila['entrenador'];
		$pais = $fila['pais'];
		$idequipo = $fila['id_equipo'];
		$foto = $fila['foto_bandera'];
		echo "<tr>
				<td class='auto-style2'>$nombre</td>
				<td class='auto-style2'>$entrenador</td>
				<td class='auto-style2'>$pais</td>
				<td>
					<img src= '$foto' width='50' heigth='50' />
				</td>
				<td><form action='' method='post' class='$idequipo' enctype='multipart/form-data'>
						<input name='id' type ='Hidden' value='$idequipo'>
						<input name='nombre' type ='Hidden' value='$nombre'>
						<input name='entrenador' type ='Hidden' value='$entrenador'>
						<input name='pais' type ='Hidden' value='$pais'>
						<input name='foto' type ='Hidden' value='$foto'>
						<Input name='$idequipo' type='submit' value='Aceptar'>
					</form>
				</td>
				<td><form action='ingresarJugadores.php' method='post' class='$idequipo' enctype='multipart/form-data'>
						<input name='idss' type ='hidden' value='$idequipo'>
						<Input name='$idequipo' type='submit' value='Agregar'>
					</form>
				</td>
			</tr>";
	}
	echo "</table>";
?>
<?php
$eg="'editarEquipo.php'";
$gg="'GuardarEquipo.php'";
$idequipo = $_POST['id'];
$nombre1 = $_POST['nombre'];
$entrenador1= $_POST['entrenador'];
$pais1=$_POST['pais'];
$foto1 = $_POST['foto'];
echo "<form  method='post'  enctype='multipart/form-data'>
	
	<table class='auto-style1'>
            <tr>
                <td class='auto-style2'>Nombre Equipo:</td>
                <td>
                    <Input  name='nombre' type='text' value = '$nombre1'>
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Entrenador:</td>
                <td>
                    <Input name='entrenador' type='text' value ='$entrenador1'>
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Pais:</td>
                <td>
                	<input name='idequipo' type='hidden' value='$idequipo'>
                    <Input name='pais' type='text' value='$pais1'>
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Foto Bandera:</td>
                <td>
                    <input name='foto' type='file' id='foto'>
                </td>"
            ?>
            </tr>
            <tr>
                <td>
                	<input type="submit" onclick= "this.form.action ='editarEquipo.php'" value='Editar'>
                	
                </td>
                <td>
                    <input type='submit' onclick= "this.form.action ='GuardarEquipo.php'"  value='Guardar'>
                </td>
            </tr>
            
        </table>
</form>

