
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
					<li><a href="areas.php">Areas</a></li>
					<li><a>Personal</a>
					<ul>
							<li><a href="coorAreas.php">Coordinadores de Area</a></li>
							<li  class="current-menu-item"><a href="postulantes.php">Postulantes</a></li>
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
	        	
	        	<div class="page-title"><h1>Esocojer Postulantes</h1> <span>de la Jornada de Insercion Mechona</span></div>
					
					<!-- side content -->
					<div id="side-content">

						
						<?php
						$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
						$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
						session_start();
						
						$id_area = $_POST['f_area'];
						$query7 = pg_query("select * from areas_jim where id_area = $id_area");
						while($fila7 = pg_fetch_array($query7))
						{
							$name = $fila7['nombre'];
						}
						echo "<h4>$name</h4>";
						$query = pg_query("select * from datos order by nombre");
						?>
												
							<table border="1" class="auto-style1">
								<tr>
									<th><span>Nombre</span></th>
									<th><span>Carrera</span></th>
									<th><span>Email</span></th>
									<th>Telefono</th>
									<th>Talla</th>
									<th>Seleccionado en</th>
								
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
											
						<?php
						while ($fila = pg_fetch_array($query))
						{
							$idato = $fila['id_dato'];
							$prioridad ;
							$prioridad1;
							$prioridad2;
							$seleccionado1;
							$seleccionado2;
							$seleccionado3;
							$otra1 ;
							$otra2 ;
							$nombre = $fila['nombre'];
							$carrera = $fila['carrera'];
							$email = $fila['email'];
							$telefono = $fila['telefono'];
							$talla = $fila['talla_polera'];
							if ($id_area = "todos")
							{
								$query2 = pg_query("select * from postulante");
							}
							else 
							{
								$query2 = pg_query("select * from postulantes where pref1 = $id_area or pref2 = $id_area or pref3 = $id_area");
							}
							while($fila2 = pg_fetch_array($query2))
							{
								$id_dato = $fila2['id_dato'];
								$pref1 = $fila2['pref1'];
								$pref2 = $fila2['pref2'];
								$pref3 = $fila2['pref3'];
								$selec1 = $fila2['selec1'];
								$selec2 = $fila2['selec2'];
								$selec3 = $fila2['selec3'];
								$query3 = pg_query("select * from areas_jim where id_area = $pref1");
								$pref1n = "";
								$pref2n = "";
								$pref3n = "";
								while($fila3 = pg_fetch_array($query3))
								{
									$pref1n = $fila3['nombre'];
								}
								$query4 = pg_query("select * from areas_jim where id_area = $pref2");
								while($fila4 = pg_fetch_array($query4))
								{
									$pref2n = $fila4['nombre'];
								}
								$query5 = pg_query("select * from areas_jim where id_area = $pref3");
								while($fila5 = pg_fetch_array($query5))
								{
									$pref3n = $fila5['nombre'];
								}
								if ($pref1 == $id_area)
								{
									$prioridad = 1;
									$otra1 = $pref2n;
									$prioridad1 = 2;
									$otra2 = $pref3n;
									$prioridad2 = 3;
									if ($selec1 == 1)
									{
										$seleccionado1 = "Seleccionado";
									}
									else {
										$seleccionado1 = "No seleccionado";
									}
									if ($selec2 == 1)
									{
										$seleccionado2 = "Seleccionado";
									}
									else {
										$seleccionado2 = "No seleccionado";
									}
									if ($selec3 == 1)
									{
										$seleccionado3 = "Seleccionado";
									}
									else {
										$seleccionado3 = "No seleccionado";
									}
								}
									
								
								elseif ($pref2 == $id_area )
								{
									$prioridad = 2;
									$otra1 = $pref1n;
									$prioridad1 = 1;
									$otra2 = $pref3n;
									$prioridad2 = 3;
									if ($selec2 == 1)
									{
										$seleccionado1 = "Seleccionado";
									}
									else {
										$seleccionado1 = "No seleccionado";
									}
									if ($selec1 == 1)
									{
										$seleccionado2 = "Seleccionado";
									}
									else {
										$seleccionado2 = "No seleccionado";
									}
									if ($selec3 == 1)
									{
										$seleccionado3 = "Seleccionado";
									}
									else {
										$seleccionado3 = "No seleccionado";
									}
								}
								else
								{
									$prioridad = 3;
									$otra1 = $pref1n;
									$prioridad1 = 1;
									$otra2 = $pref2n;
									$prioridad2 = 2;
									if ($selec3 == 1)
									{
										$seleccionado1 = "Seleccionado";
									}
									else {
										$seleccionado1 = "No seleccionado";
									}
									if ($selec1 == 1)
									{
										$seleccionado2 = "Seleccionado";
									}
									else {
										$seleccionado2 = "No seleccionado";
									}
									if ($selec2 == 1)
									{
										$seleccionado3 = "Seleccionado";
									}
									else {
										$seleccionado3 = "No seleccionado";
									}
								}
								if ($idato == $id_dato)
								{
									if ($seleccionado1 = "Seleccionado")
									{
										if ($seleccionado2 = "No seleccionado")
										{
											$otra1 = "";
										}
										if ($seleccionado3 = "No seleccionado")
										{
											$otra2 = "";
										}
										echo "<tr>
										<form action='' method='post' >
										<input name='id_dato' type='hidden' value='$idato'>
										<input name='prioridad' type='hidden' value='$prioridad'>
										<input name='id_area' type='hidden' value='$id_area'>
										<td>$nombre</td>
										<td>$carrera</td>
										<td>$email</td>
										<td>$telefono</td>
										<td>$talla</td>
										<td> $otra1/$otra2 </td>
									</form>						
										</tr>";
									}
																
								}
							}
						}				
														
						?>
								
					</table>
						
					</div>
					<!-- ENDS side content -->
					
					
					
	        	
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
