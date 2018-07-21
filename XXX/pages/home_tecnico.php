<?php
// Inicializar la sesión
session_start();
 
//Si la sesión lleva inactiva media hora se destruye.
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();    
    session_destroy(); 
    header("location: login.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); //Se actualiza el tiempo de la última actividad

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}else if($_SESSION['tipo_usuario'] == 2){
    header("location: home_supervisor.php");
    exit;
}else if($_SESSION['tipo_usuario'] == 1){
    header("location: home_admin.php");
    exit;
}
?>


<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="../img/Logo de SAG Vertical fondo blanco.png">
		<meta name="author" content="codepixer">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta charset="UTF-8">
		<title>SAG - Secretaría de Agricultura y Ganaderia - Gobierno de la República de Honduras</title>

		<!-- CSS ============================================= -->
			<link rel="stylesheet" href="../css/linearicons.css">
			<link rel="stylesheet" href="../css/font-awesome.min.css">
			<link rel="stylesheet" href="../css/bootstrap.css">
			<link rel="stylesheet" href="../css/magnific-popup.css">
			<link rel="stylesheet" href="../css/nice-select.css">					
			<link rel="stylesheet" href="../css/animate.min.css">
			<link rel="stylesheet" href="../css/owl.carousel.css">
			<link rel="stylesheet" href="../css/main.css">
			<link rel="stylesheet" href="../css/util.css">
            <link rel="stylesheet" href="../css/mainlogin.css">

            
		</head>
		<body>

			  <header id="header" id="home">

				<div class="header-top">
		  			<div class="header-top-right no-padding">
						<img src="../img/Logo SAG Horizontal nuevo.png" alt="Logo SAG" class="header-sag">
						<img src="../img/infoagro textual.png" alt="Logo INFOAGRO" class="header-sag"> 
						<img src="../img/LOGO FHIA.jpg" alt="Logo FHIA" class="header-fhia">
					</div>
				</div>		
					  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">      
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
                          <li class="menu-active"><a href="../index.php">Home</a></li>
                          <li style="color:white;"><a> Reportes</a>
                            <ul>
                                <li>
                                    <a href="reporte_zona.php">Reportes por zonas</a>
                                </li>
                                <li>
                                    <a href="reporte_semanal.php">Reporte semanal</a>
                                </li>
                                <li>
                                    <a href="reporte_mensual.php">Reportes mensual</a>
                                </li>
                                <li>
                                    <a href="reporte_llamadas.php">Reportes de llamadas</a>
                                </li>
                            </ul>
                          </li>
                          <li style="color:white;"><a >CONTROL DE LLAMADAS</a> 
                            <ul>
                                <li><a href="control_llamadas.php">Registro de llamadas</a></li>
                                <li><a href="historial_llamadas.php">Historial llamadas</a></li>
                            </ul>                                  
                          </li>
                          <li style="color:white;"><a>PRODUCTORES</a> 
                            <ul>
                                <li><a href="registrar_productor.php">Registrar productor</a> </li>
                                <li><a href="historial_productores.php">Listado de productores</a></li>
                            </ul>
                          </li>				          
                          <li><a href="#footerSection">Siguenos</a></li>                        
                          
                          <li class="dropdown" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-3x"></i>
                            </a>
                    
                            <ul class="dropdown-menu dropdown-user">
                                
                                <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil Usuario</a>
                                </li>
                                <li><a href="../Manual de Usuario-IlumiArts.pdf" target="_blank"><i class="fa fa-gear fa-fw"></i>Manual de Usuario</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                                </li>
                            </ul>
                           </li>


				    	</ul>
				      </nav>	    		
			    	</div>
			    </div>
			  </header>
				
				<section class="banner-area" id="home">	
                <div class="bg-contact2 body-tecnico">
                    <div class="container-contact2">
                        <div class=" home-contact2">


                        <div class="w3-content w3-margin-top">
                            <div class="w3-row-padding">

                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="w3-text-grey w3-padding-16">
                            <i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>DATOS IMPORTANTES</h2>
                        <div class="w3-container">
                            <h5 class="w3-opacity">
                                <b>REPORTES - USUARIOS - ZONAS</b>
                            </h5><br>
                            <h6 class="w3-text-teal">
                                <i class="fa fa-calendar fa-fw w3-margin-right"></i>2018
                                <span class="w3-tag w3-teal w3-round">Lista Actulizada</span>
                            </h6>

                            <div class="row tile_count">
                                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="margin-right: 95px">
                                    <span class="count_top">
                                        <i class="fa fa-user"></i> Total Productores</span>
                                    <div class="count">2500</div>
                                    <span class="count_bottom">
                                        <i class="green">4% </i> From last Week</span>
                                </div><hr>

                                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="margin-right: 95px">
                                    <span class="count_top">
                                        <i class="fa fa-user"></i> Total Técnicos</span>
                                    <div class="count">2500</div>
                                    <span class="count_bottom">
                                        <i class="green">4% </i> From last Week</span>
                                </div><hr>


                                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="margin-right: 95px">
                                    <span class="count_top">
                                        <i class="fa fa-user"></i> Total Zonas</span>
                                    <div class="count">2,315</div>
                                    <span class="count_bottom">
                                        <i class="green">
                                            <i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                                </div><hr>

                                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="margin-right: 95px">
                                    <span class="count_top">
                                        <i class="fa fa-user"></i> Total Llamadas registradas</span>
                                    <div class="count">2,315</div>
                                    <span class="count_bottom">
                                        <i class="green">
                                            <i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
                </section>

			<footer class="footer-area" id="footerSection">
				<div class="col-lg-12 col-md-12 col-sm-12 social-widget ">
					<div class="single-footer-widget footer-redes siguenos">
						<h1 style="color: white;">Siguenos</h1>
							<div class="footer-redes">
								<a href="https://www.facebook.com/saghn" target="_blank" ><i class="fa fa-facebook"></i></a>
								<a href="https://www.twitter.com/saghonduras" target="_blank"><i class="fa fa-twitter"></i></a>
							</div>
					</div>
				</div>		
						<br>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="single-footer-widget"></div>
						<p class="footer-text">									
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Estudiantes UNAH | INGENIERIA DEL SOFTWARE</a>
						</p>								
					</div>
				</div>												
			</footer>			

			<script src="../js/vendor/jquery-2.2.4.min.js"></script>
			<script src="../js/vendor/bootstrap.min.js"></script>			
  			<script src="../js/easing.min.js"></script>			
			<script src="../js/hoverIntent.js"></script>
			<script src="../js/superfish.min.js"></script>	
			<script src="../js/jquery.ajaxchimp.min.js"></script>
			<script src="../js/jquery.magnific-popup.min.js"></script>	
			<script src="../js/owl.carousel.min.js"></script>			
			<script src="../js/jquery.sticky.js"></script>
			<script src="../js/jquery.nice-select.min.js"></script>			
			<script src="../js/parallax.min.js"></script>	
			<script src="../js/waypoints.min.js"></script>
			<script src="../js/jquery.counterup.min.js"></script>					
			<script src="../js/mail-script.js"></script>	
			<script src="../js/main.js"></script>	
		</body>
	</html>



