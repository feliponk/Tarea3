<!DOCTYPE  html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Coordinador de areas</title>
		
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
					<li ><a href="menuCoor_areas.php">Home</a></li>
					<li><a href="misDatos2.php">Mis datos</a></li>
					
					<li><a>Personal</a>
					<ul>
							
							<li><a href="postulantes2.php">Postulantes</a></li>
							<li><a href="Seleccionados2.php">Seleccionados</a></li>
					</ul>
					</li>
					<li class="current-menu-item"><a href="noticias2.php">Noticias</a></li>
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
	        	
	        	<div class="page-title"><h1>Gestion de noticias</h1> <span>de la Jornada de Insercion Mechona</span></div>
					
					<!-- side content -->
					<div id="side-content">

						<h4>Seleccione noticia</h4>
						<?php
						$conexion = "host=127.0.0.1 port=5432 dbname=tarea3 user=postgres password=dantecry";
						$conn = pg_connect($conexion) or die ("error en conexión.".pg_last_error());
						session_start();
						$id_dato = $_SESSION['idato'];
						$quer = pg_query("select * from coor_areas where id_dato = $id_dato");
						while ($fil = pg_fetch_array($quer))
						{
							$area = $fil['area'];
						}
						$query = pg_query("select * from datos where id_dato = $id_dato");
						while($fila=pg_fetch_array($query)){
							$campus = $fila['campus'];
						}
						$query2 = pg_query("select * from areas_jim where campus = '$campus'");
						
						?>
						
						<table border="1" class="auto-style1">
							<tr>
								<th>Titular</th>
								<th>Fecha</th>
								<th>Area</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
					
						<?php
						while($fila2 = pg_fetch_array($query2)){
							$id_area = $fila2['id_area'];
							$nombre_a = $fila2['nombre'];
							$query3 = pg_query("select * from noticias where id_area = $id_area");
							while ($fila3 = pg_fetch_array($query3))
							{
								$id_noticia = $fila3['id_noticia'];
								$titular = $fila3['titular'];
								$fecha  = $fila3['fecha'];
								echo "<tr>
										<form action='' method='post' >
										<input name='id_noticia' type='hidden' value='$id_noticia'>
										<input name='campus' type='hidden' value='$campus'>
										<td>$titular</td>
										<td>$fecha</td>
										<td>$nombre_a</td>"
										?>
										<td><input type='submit' value='Editar'"   onclick= "this.form.action ='editarNoticia2.php'" ></td>
										<td><input type='submit' value='Eliminar'"  onclick= "this.form.action ='eliminarNoticia2.php'" ></td>
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
					<h4>Agregar noticia</h4>
					<?php
					
						echo "<form action='agregarNoticia2.php' method='post' >
								<table border='1' class='auto-style1'>
								<th>Datos</th>
								<th></th>
								<tr>
									<td>Titular: </td>
									<td><input name='f_titular' type='text' value='' ></td>
								</tr>
								<tr>
									<td>Cuerpo noticia: </td>
									<td><input name='f_cuerpo' type='text' value='' ></td>
								</tr>
									<td>Area: </td>
									<td><select name='f_area'>";
									
										echo "<option value='$area'>$nombre_a</option>";
									
								echo "</select>";	
								echo "</td>
								</tr>
								<tr>
									<td>Fecha: </td>
									<td><select name='f_dia'>
										<option value='01'>1</option>
										<option value='02'>2</option>
										<option value='03'>3</option>
										<option value='04'>4</option>
										<option value='05'>5</option>
										<option value='06'>6</option>
										<option value='07'>7</option>
										<option value='08'>8</option>
										<option value='09'>9</option>
										<option value='10'>10</option>
										<option value='11'>11</option>
										<option value='12'>12</option>
										<option value='13'>13</option>
										<option value='14'>14</option>
										<option value='15'>15</option>
										<option value='16'>16</option>
										<option value='17'>17</option>
										<option value='18'>18</option>
										<option value='19'>19</option>
										<option value='20'>20</option>
										<option value='21'>21</option>
										<option value='22'>22</option>
										<option value='23'>23</option>
										<option value='24'>24</option>
										<option value='25'>25</option>
										<option value='26'>26</option>
										<option value='27'>27</option>
										<option value='28'>28</option>
										<option value='29'>29</option>
										<option value='30'>30</option>
										<option value='31'>31</option>
										</select>
									<select name='f_mes'>
										<option value='01'>Enero</option>
										<option value='02'>Febrero</option>
										<option value='03'>Marzo</option>
										<option value='04'>Abril</option>
										<option value='05'>Mayo</option>
										<option value='06'>Junio</option>
										<option value='07'>Julio</option>
										<option value='08'>Agosto</option>
										<option value='09'>Septiembre</option>
										<option value='10'>Octubre</option>
										<option value='11'>Noviembre</option>
										<option value='12'>Diciembre</option>
										</select>
									<select name='f_ano'>
										<option value='2014'>2014</option>
										<option value='2013'>2013</option>
										<option value='2012'>2012</option>
										<option value='2011'>2011</option>
										<option value='2010'>2010</option>
										<option value='2009'>2009</option>
										<option value='2008'>2008</option>
										<option value='2007'>2007</option>
										<option value='2006'>2006</option>
										<option value='2005'>2005</option>
										<option value='2004'>2004</option>
										<option value='2003'>2003</option>
										<option value='2002'>2002</option>
										<option value='2001'>2001</option>
										<option value='2000'>2000</option>
										<option value='1999'>1999</option>
										<option value='1998'>1998</option>
										<option value='1997'>1997</option>
										<option value='1996'>1996</option>
										<option value='1995'>1995</option>
										<option value='1994'>1994</option>
										<option value='1993'>1993</option>
										<option value='1992'>1992</option>
										<option value='1991'>1991</option>
										<option value='1990'>1990</option>
										<option value='1989'>1989</option>
										<option value='1988'>1988</option>
										<option value='1987'>1987</option>
										<option value='1986'>1986</option>
										<option value='1985'>1985</option>
										<option value='1984'>1984</option>
										</select></td>
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
