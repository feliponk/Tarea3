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
	        	
	        	<div class="page-title"><h1>Gestion de Areas</h1> <span>de la Jornada de Insercion Mechona</span></div>
					
					<!-- side content -->
					<div id="side-content">

						<h4>Seleccione Area</h4>
						<?php
						$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
						$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
						session_start();
						$id_dato = $_SESSION['idato'];

						$query = pg_query("select * from datos where id_dato = $id_dato");
						while($fila=pg_fetch_array($query)){
							$campus = $fila['campus'];
						}
						$query2 = pg_query("select * from areas_jim where campus = '$campus'");
						
						?>
						
						<table class='table-fill'>
							<tr>
								<th><span>Nombre</span></th>
								<th><span>Colaboradores estimados</span></th>
								<th><span>Seleccionados</span></th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
					
						<?php
						while($fila2 = pg_fetch_array($query2)){
							$id_area = $fila2['id_area'];
							$nombre = $fila2['nombre'];
							$colab_estimado = $fila2['n_estimado_colab'];
							$seleccionados = $fila2['n_seleccionados'];
							echo "<tr>
										<form action='' method='post' >
										<input name='id_area' type='hidden' value='$id_area'>
										<td>$nombre</td>
										<td>$colab_estimado</td>
										<td>$seleccionados</td>"
										?>
										<td><input type='submit' value='Editar'"   onclick= "this.form.action ='editarArea.php'" ></td>
										<td><input type='submit' value='Eliminar'"  onclick= "this.form.action ='eliminarArea.php'" ></td>
										<?php "
										
									</form>						
								</tr>";
								
						}	
						
						?>
						
					</table>
						
					</div>
					<!-- ENDS side content -->
					
					
					<!-- sidebar -->
					<div id="sidebar">
					<h4>Agregar area</h4>
					<?php
						echo "<form action='agregarArea.php' method='post' >
								<table border='1' class='auto-style1'>
								<th>Datos</th>
								<th></th>
								<tr>
									<input name='id_area' type='hidden' value='$id_area'>
									<input name='campus' type='hidden' value='$campus'>
									<td>Nombre: </td>
									<td><input name='f_nombre' type='text' value='' ></td>
								</tr>
								<tr>
									<td>N° colaboradores: </td>
									<td><input name='f_estimado' type='text' value='' ></td>
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
