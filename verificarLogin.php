<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">
	
</head>
<body>

<?php

$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());

$email = $_POST['user'];
$contraseña = $_POST['password'];

if ($email == "" || $contraseña == "")
{
	?>
	<script language="javascript"> 
	alert("Datos en blanco"); 
	</script> 
	<?php
	echo "<script type='text/javascript'>";
	echo "window.history.back(-1)";
	echo "</script>";
}

else {

	$aux = 0;
	$query = pg_query("SELECT * FROM datos WHERE email = '$email' and pass = '$contraseña'");
	$count = pg_num_rows($query);
	while($fila=pg_fetch_array($query)){
		$id_dato = $fila['id_dato'];
	}
	if($count == 1)
	{
		
		session_start();
		$_SESSION['idato'] =  $id_dato;
		
		$query2 = pg_query("select * from coor_generales where id_dato = $id_dato");
		$aux = pg_num_rows($query2);
		if( $aux == 1)
		{
			header("location:menuCoor.php");
		}
		$query3 = pg_query("select * from coor_areas where id_dato = $id_dato");
		$aux = pg_num_rows($query3);
		if( $aux == 1)
		{
			header("location:menuCoor_areas.php");
		}
		$query4 = pg_query("select * from postulantes where id_dato = $id_dato");
		$aux = pg_num_rows($query4);
		if( $aux == 1)
		{
			header("location:menuPostulantes.php");
		}
	}
	
	else
	{
		
			echo "<script language='javascript'>"; 
			echo "alert('email o constraseña invalida')"; 
			echo "</script>"; 
			
			echo "<script type='text/javascript'>";
			echo "window.history.back(-1)";
			echo "</script>";
	}

}

?>



	<!-- Primary Page Layout -->


		


	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>