<?php
$fecha = $_POST['fecha'];
$ganador = $_POST['ganador'];
$t_ext = $_POST['tiempo'];
$lugar = $_POST['lugar'];
$id = $_POST['ide'];


$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
$query= $query=pg_query("update partido set n_ganador='$ganador', tiempo_extra ='$t_ext',nombre_estadio='$lugar', realizado= '1' where id_partido = '$id'");

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
	

}


?>
<form  method='post'  enctype='multipart/form-data'>
	
	<table class='auto-style1'>
            <tr>
                <td class='auto-style2'>Jugador:</td>
                <td>
                    <Input  name='jugador' type='text' >
                </td>
                
            </tr>
   
            <tr>
                <td class='auto-style2'>Numero de goles:</td>
                <td>
                    <Input name='n_goles' type='text' >
                </td>
                <?php
                
                echo "<td>
                    <Input name='idp' type='hidden' value = $id>
                </td>"
			?>
            </tr>
            <tr>
                <td>
                	<input type="submit" onclick= "this.form.action ='agregarGoles.php'" value='Guardar'>
                	<input type="submit" onclick= "this.form.action ='MenuAdmi.php'" value='Terminar'>
                	
                </td>
            </tr>
            
        </table>
  </form>