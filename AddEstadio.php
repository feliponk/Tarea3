<h1 style="background-color: #0099CC">
    Gestionar Estadio</h1>
	<p style="background-color: #00CCFF">
    Ingrese o edite los datos del estadio:</p>
<?php
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
	$query = pg_query("select * from estadio order by nombre");
	echo "<table border='1' class='auto-style1 >
			<tr>
				<td class='auto-style2'>Estadios</td>
				<td class='auto-style2'>Nombre</td>
				<td class='auto-style2'>Ciudad</td>
				<td class='auto-style2'>Direccion</td>
				<td class='auto-style2'>Capacidad</td>
				<td class='auto-style2'>Descripcion</td>
				<td class='auto-style2'>Foto</td>
			</tr>";
	while($fila=pg_fetch_array($query)){
		$nombre = $fila['nombre'];
		$ciudad = $fila['ciudad'];
		$direccion = $fila['direccion'];
		$capacidad = $fila['capacidad'];
		$descripcion = $fila['descripcion'];
		$foto = $fila['foto'];
		echo "<tr>
				<td class='auto-style2'>$nombre</td>
				<td class='auto-style2'>$ciudad</td>
				<td class='auto-style2'>$direccion</td>
				<td class='auto-style2'>$capacidad</td>
				<td class='auto-style2'>$descripcion</td>
				<td>
					<img src= '$foto' width='50' heigth='50' />
				</td>
				<td><form action='' method='post' class='pasar' enctype='multipart/form-data'>
						<input name='nombre' type ='Hidden' value='$nombre'>
						<input name='ciudad' type ='Hidden' value='$ciudad'>
						<input name='direccion' type ='Hidden' value='$direccion'>
						<input name='capacidad' type ='Hidden' value='$capacidad'>
						<input name='descripcion' type ='Hidden' value='$descripcion'>
						<Input name='pasar' type='submit' value='Aceptar'>
					</form>
				</td>
			</tr>";
	}
	echo "</table>";
?>
<?php

$ciudad1 = $_POST['ciudad'];
$nombre1 = $_POST['nombre'];
$direccion1= $_POST['direccion'];
$capacidad1=$_POST['capacidad'];
$descripcion1=$_POST['descripcion'];
echo
"<form  method='post' enctype='multipart/form-data'>
	
	<table class='auto-style1'>
            <tr>
                <td class='auto-style2'>Nombre Estadio:</td>
                <td>
                    <Input  name='nombre' type='text' value='$nombre1'>
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Ciudad:</td>
                <td>
                    <Input name='ciudad' type='text' value='$ciudad1'>
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Direccion:</td>
                <td>
                    <Input name='direccion' type='text' value='$direccion1'>
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Capacidad:</td>
                <td>
                    <Input name='capacidad' type='text' value='$capacidad1' >
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Descripción;</td>
                <td>
                    <Input name='descripcion' type='text' value='$descripcion1' >
                </td>
            </tr>
            <tr>
                <td class='auto-style2'>Foto:</td>
                <td>
                    <input name='foto' type='file' id='foto'>
                </td>
            </tr>"
            ?>
            <tr>
                <td>
                	<input type="submit" onclick= "this.form.action ='editarEstadio.php'" value='Editar'>
                	
                </td>
                <td>
                    <input type='submit' onclick= "this.form.action ='GuardarEstadio.php'"  value='Guardar'>
                </td>
            </tr>
            
        </table>
</form>
            

