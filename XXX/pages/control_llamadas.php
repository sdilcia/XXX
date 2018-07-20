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
    <link rel="stylesheet" href="../css/bootstrap/bootstrap-select.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap-select.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/mainlogin.css">
    <link rel="stylesheet" href="../css/util.css">
    <link rel="stylesheet" href="../css/home_page_users.css">
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
                          
                          <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-3x"></i>
                            </a>
                    
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a>
                                </li>
                                <li><a href="../Manual de Usuario-IlumiArts.pdf" target="_blank"><i class="fa fa-gear fa-fw"></i>Manual de Usuario</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
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
                <div class="wrap-contact2" style="
    margin-top: 200px;
">
                         <form class="contact2-form validate-form">
                         <span class="contact2-form-title">
                            Registro de Control de Llamada a Productores
                        </span>
                                        <div class="descripcion">
                                            <b>Productor:</b>
                                        </div>
                                        <div class="valor">
                                        <select class="selectpicker" data-live-search="true">
                                            
                                        <option data-tokens="Seleccione Productor" value="-">Seleccione productor</option>
                                                <option value="0">Productor 1</option>
                                                <option value="1">Productor 2</option>
                                                <option value="2">Productor 3</option>
                                            </select>
                                        </div>

                                        <br>

                                        <div class="descripcion">
                                            <b>Número de llamadas realizadas</b>
                                        </div>
                                        <div class="valor">
                                            <input type="text" name="txtNumeroLlamadas" class="form-control">
                                        </div>
                                        <br>

                                        <div class="descripcion">
                                            <b>Control de llamada:</b>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                                <div class="radio">
                                                     <label><input type="radio" id="noRespondio "name="noRespondio" value="1">No respondieron</label>
                                                </div><br>

                                                <div class="radio">
                                                     <label><input  type="radio" id="repondioComercializo" name="repondioComercializo"  value="2"  >Respondieron y comercializaron</label>
                                                </div><br>

                                                <div class="radio">
                                                     <label><input  type="radio" id="RepondioNoComercializo" name="RepondioNoComercializo"  value="3">Respondieron y no comercializaron</label>
                                                </div><br>
                                        </div>
                                        <br>

                                        <div class="descripcion">
                                            <b>Observaciones:</b>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="observacion"></textarea>
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

    <footer class="footer-area section-gap" id="footerSection">
        <div class="col-lg-6 col-md-6 col-sm-6 social-widget ">
            <div class="single-footer-widget footer-redes">
                <h6>Siguenos</h6>
                <div class="footer-redes">
                    <a href="https://www.facebook.com/saghn" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.twitter.com/saghonduras" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="single-footer-widget"></div>
            <p class="footer-text">
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved
                <br> Estudiantes UNAH
                <br> INGENIERIA DEL SOFTWARE</a>
            </p>
        </div>
        </div>
    </footer>

    <script src="../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/vendor/bootstrap-select.js"></script>
    <script src="../js/vendor/bootstrap-select.min.js"></script>
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
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }

        //Buscador para el select de productores
        function buscarSelect()
            {
                // creamos un variable que hace referencia al select
                var select=document.getElementById("elementos");
            
                // obtenemos el valor a buscar
                var buscar=document.getElementById("buscar").value;
            
                // recorremos todos los valores del select
                for(var i=1;i<select.length;i++)
                {
                    if(select.options[i].text==buscar)
                    {
                        // seleccionamos el valor que coincide
                        select.selectedIndex=i;
                    }
                }
            }
    </script>


</body>

</html>