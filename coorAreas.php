<!DOCTYPE  html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Coordinador general</title>
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/table.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
		<!-- ENDS CSS -->	
		
		<!--[if IE]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- ENDS JS -->
		
		<!-- JS -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/slider.js"></script>
		<script src="js/slides/source/slides.min.jquery.js"></script>
		<script src="js/quicksand.js"></script>
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->

		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- prettyPhoto -->
		<script type="text/javascript" src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>
		

	</head>
	<body>
	
		<!-- Dynamic Background -->
		<div id="headerimgs">
			<div id="headerimg1" class="headerimg"></div>
			<div id="headerimg2" class="headerimg"></div>
		</div>
		<!-- ENDS Dynamic Background -->
		
		<!-- background nav -->
		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
		<!-- ENDS background nav -->
		
		<div id="top-gap"></div>

		<!-- wrapper -->
		<div class="wrapper">
		
			<a href="menuCoor.php"><img  id="logo" src="img/logo.png" alt="Kroft"></a>
			
			
			<!-- nav bar holder -->
			<div id="nav-bar-holder">
				<!-- Navigation -->
				<ul id="nav" class="sf-menu">
					<li><a href="menuCoor.php">Home</a></li>
					<li><a href="misDatos.php">Mis datos</a></li>
					<li class="current-menu-item"><a href="areas.php">Areas</a></li>
					<li><a>Personal</a>
					<ul>
							<li><a href="coorAreas.php">Coordinadores de Area</a></li>
							<li><a href="postulantes.php">Postulantes</a></li>
							<li><a href="Seleccionados.php">Seleccionados</a></li>
					</ul>
					</li>
					<li><a href="noticias.php">Noticias</a></li>
					<li><a href="Logout.php">Cerrar Sesion</a></li>
				</ul>
				<!-- ENDS Navigation -->
				
				<!-- Social -->
				<ul class="social">
					<li><a href="http://www.facebook.com" class="poshytip  facebook" title="Become a fan"></a></li>
					<li><a href="http://www.twitter.com" class="poshytip  twitter" title="Follow my tweets"></a></li>
					<li><a href="http://www.dribbble.com" class="poshytip  dribbble" title="Working on..."></a></li>
				</ul>
				<!-- ENDS Social -->
			</div>
			<!-- ENDS nav bar holder -->
				
			<!-- content wrap -->	    	
	        <div id="content-wrap">
	        	
	        	<!-- Page wrap -->
	        	<div id="page-wrap">
	        	
	        	<div class="page-title"><h1>Gestion</h1> <span>de Coordinadores de area</span></div>
					
					<!-- side content -->
					<div id="side-content">

						<h4>Seleccione coordinador</h4>
						<?php
						$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
						$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
						session_start();
						$id_dato = $_SESSION['idato'];

						$query = pg_query("select * from datos where id_dato = $id_dato");
						while($fila=pg_fetch_array($query)){
							$campus = $fila['campus'];
						}
						$query2 = pg_query("select * from coor_areas");
						
						?>
						
						<table class='table-fill'>
							<tr>
								<th>Nombre</th>
								<th>Area</th>
								
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
					
						<?php
						while($fila2 = pg_fetch_array($query2)){
							$idato = $fila2['id_dato'];
							$area = $fila2['area'];
							$query4 = pg_query("select * from areas_jim where id_area = $area");
							while($fila4 = pg_fetch_array($query4))
							{
								$nombre_area = $fila4['nombre'];
							
							}
							$query3 = pg_query("select * from datos where id_dato = $idato and campus = '$campus'");
							while($fila3 = pg_fetch_array($query3))
							{
								$nombre = $fila3['nombre'];
								echo "<tr>
								<form action='' method='post' >
								<input name='id_dato' type='hidden' value='$idato'>
								<input name='campus' type='hidden' value='$campus'>
								<td>$nombre</td>
								<td>$nombre_area</td>"
								?>
								<td><input type='submit' value='Editar'"   onclick= "this.form.action ='editarCoor.php'" ></td>
								<td><input type='submit' value='Eliminar'"  onclick= "this.form.action ='eliminarCoor.php'" ></td>
								<?php "
																		
								</form>						
								</tr>";
								
							}
							
							
							
							
								
						}	
						
						?>
						
					</table>
						
					</div>
					<!-- ENDS side content -->
					
					
					<!-- sidebar -->
					<div id="sidebar">
					<h4>Agregar coordinador</h4>
					<?php
						$query5 = pg_query("select * from areas_jim where campus = '$campus' ");
						echo "<form action='agregarCoor.php' method='post' >
								<table class='table-fill'>
								<th>Datos</th>
								<th></th>
								<tr>
									
									<input name='campus' type='hidden' value='$campus'>
									<td>Nombre: </td>
									<td><input name='f_nombre' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Rol: </td>
									<td><input name='f_rol' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Rut: </td>
									<td><input name='f_rut' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Area: </td>
									<td><select name='f_area'>";
									while ($fila5 = pg_fetch_array($query5))
									{
										echo "<option value=".$fila5[0].">".$fila5[2]."</option>";
									}
								echo "</select>";	
								echo "</td>
								</tr>
								<tr>
									<td>Telefono: </td>
									<td><input name='f_telefono' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Talla de polera: </td>
									<td><input name='f_talla' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Carrera: </td>
									<td><input name='f_carrera' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Correo electronico: </td>
									<td><input name='f_correo' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Contraseña: </td>
									<td><input name='f_pass' type='password' value='' ></td>
								</tr>
								<tr>
									<td></td>
									<td><input  type='submit' value='Guardar' ></td>
								</tr>
						</table>
						</form>";
						?>
						
					</div>
					<!-- ENDS sidebar -->
					
					<div class="clear"></div>
	        	
	        	</div>
	        	<!-- ENDS Page wrap -->
	        	
	        </div>
	        <!-- ENDS content wrap -->
	        
        </div>
		<!-- ENDS Wrapper -->
		
		<!-- FOOTER -->
		<div id="footer">
			<div class="footer-wrapper">
				
				
				<!-- footer-cols -->
				<ul id="footer-cols">
					<li>
						<h6>About the theme</h6>
						<p>Pellentesque accumsan porttitor, accumsan porttitor ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Tincidunt quis, accumsan porttitor facilisis habitant morbi tristique senectus accumsan porttitor et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam,  Aenean ultricies mi vitae est. Tincidunt quis feugiat vitae.</p> 
						<p>Accumsan porttitor ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Tincidunt quis, accumsan porttitor, <a href="http://luiszuno.com">luiszuno.com</a>.</p>
					</li>
					<li>
						<h6>Categories</h6>
						<ul>
							<li><a href="#">Webdesign in this era</a></li>
							<li><a href="#/">Wordpress core techniques</a></li>
							<li><a href="#">Photo editing</a></li>
							<li><a href="#">Code in php</a></li>
							<li><a href="#">Drawings by hand</a></li>
							<li><a href="#">Buy Themeforest items</a></li>
							<li><a href="#">Lorem ipsum dolor amet</a></li>
							<li><a href="#">Tincidunt quis, accumsan porttitor</a></li>
							<li><a href="#">Donec eu libero sit amet quam</a></li>
						</ul>
					</li>
					<li>
						<div id="tweets" class="footer-col tweet">
	         				<h6>Twitter widget</h6>
	         			</div>
					</li>
				</ul>
				<!-- ENDS footer-cols -->
				
				<div id="footer-glare"></div>
				
			</div>
		</div>
		<!-- ENDS FOOTER -->
		
		<!-- footer-bottom -->
		<div id="footer-bottom">
			<div class="bottom-wrapper">
				<div id="bottom-left">
					&copy; 2011 Ansimuz.  <a href="http://themeforest.net/user/Ansimuz?ref=ansimuz">View portfolio</a>
				</div>
				<div id="bottom-right">
					<ul id="footer-nav">
						<li><a href="index.html">Home</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="page.html">Pages</a>
						<li><a href="page.html">Contact</a>
					</ul>
				</div>
			</div>
		</div>
		<!-- ENDS footer-bottom -->


		
	</body>
	
</html>
