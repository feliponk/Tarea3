
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Login</title>
</head>
 <h1 style="background-color: #CCFFFF">     
        Login</h1>
      	<p style="background-color: #FF9966">
            Por favor ingrese su usuario y contraseña</p>
<form action="" method="post" class="login"> 
    <div><label>Usuario:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="user" type="text" ></div> 
    <div><label>Password:&nbsp;&nbsp;</label><input name="password" type="password"></div> 
    <div><input name="login" type="submit" value="Aceptar"></div> 
</form>
<frameset>
    <frame>
    <frame>
    <noframes>
    <body>
    
    <p>This page uses frames. The current browser you are using does not support frames.</p>
    </body>
    </noframes>
</frameset>
</html>
<?php
	$conexion = "host=127.0.0.1 port=5432 dbname=tarea3BD user=postgres password=dantecry";
	$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
	
	
	session_start();
	
	function verificar_login($user,$password,&$result)
	{
		$sql = "SELECT * FROM administrador WHERE usuario = '$user' and password = '$password'";
		$rec = pg_query($sql);
		$count = 0;
		while($row = pg_fetch_object($rec))
		{
		$count++;
		$result = $row;
		}
			if($count == 1)
			{
			return 1;
			}
			else
			{
			return 0;
			}
	}

	if(!isset($_SESSION['userid']))
	{
		if(isset($_POST['login']))
		{
			if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
			{
				$_SESSION['userid'] = $result->idusuario;
				header("location:MenuAdmi.php");
			}
			else
			{
				echo '<div class="error">Su usuario o password es incorrecto, intente nuevamente.</div>';
			}
		}
	
?>

<?php 
} else { 
    echo 'Su usuario ingreso correctamente.'; 
    echo '<a href="logout.php">Logout</a>'; 
} 
?>