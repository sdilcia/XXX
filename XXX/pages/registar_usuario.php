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
    <link rel="stylesheet" href="../css/mainlogin.css">
    <link rel="stylesheet" href="../css/util.css">

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
          <li class="menu-active"><a href="home_admin.php">Home</a></li>
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
          <li style="color:white;"><a >USUARIOS</a> 
            <ul>
                <li><a href="registar_usuario.php">Registrar usuario</a></li>
                <li><a href="historial_usuarios.php">Planilla de empleados</a></li>
            </ul>                                  
          </li>
          <li style="color:white;"><a>ZONAS</a> 
            <ul>
                <li><a href="registar_zona.php">Registrar zona</a> </li>
                <li><a href="lista_zonas.php">Listado de zonas</a></li>
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

        <div class="bg-contact2" style="background-image: url('../img/cacao2.jpg');">
            <div class="container-contact2">
                <div class="wrap-contact2">
                    <form class="contact2-form validate-form">
                        <span class="contact2-form-title">
                            Registro de Usuarios
                        </span>

                        <div class="descripcion">
                            <b>Codigo Usuario:</b>
                        </div>
                        <div class="valor">
                            <input type="text" name="txtcodigoEmpleado" class="form-control" disabled>
                        </div>

                        <div class="descripcion">
                            <b>Nombre:</b>
                        </div>
                        <div class="valor">
                            <input type="text" name="txtnombre" class="form-control" placeholder="Ingrese Nombre">
                        </div>


                        <div class="descripcion">
                            <b>Apellido:</b>
                        </div>
                        <div class="valor">
                            <input type="text" name="txtapellido" class="form-control" placeholder="Ingrese Apellido">
                        </div>

                        <div class="descripcion">
                            <b>Numero Identidad:</b>
                        </div>
                        <div class="valor">
                            <input type="text" maxlength="15" name="txtidentidad" class="form-control" placeholder="Ingrese Nº Identidad">
                        </div>

                        <div class="descripcion">
                            <b>Telefono:</b>
                        </div>
                        <div class="valor">
                            <input type="text" name="txttelefono1" class="form-control" placeholder="Ingrese Telefono 1">
                        </div>
                        <div class="valor">
                            <input type="text" name="txttelefono2" class="form-control" placeholder="Ingrese Telefono 2">
                        </div>

                        <div class="descripcion">
                            <b>Tipo de Usuario:</b>
                        </div>
                        <div class="valor">
                            <select class="form-control" name="cboUsuarios">
                                <option value="-">Seleccione tipo Usuario</option>
                                <option value="0">Administrador</option>
                                <option value="1">Tecnico</option>
                                <option value="2">Supervisor</option>
                            </select>
                        </div>

                        <div class="container-contact2-form-btn">
                            <div class="wrap-contact2-form-btn">
                                <div class="contact2-form-bgbtn"></div>
                                <button class="contact2-form-btn" style="border-color: rgb(6, 26, 6)">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

                <?php
					include("footer.php");
					echo "footer.php";
				?>	

    <script src="../js/jquery.min.js"></script>
    <script src="../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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
    <script src="../js/mainlogin.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/select2.min.js"></script>


</body>

</html>