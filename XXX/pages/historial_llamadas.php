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

// Si la variable sesión no está definida manda al login
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}

require_once 'db.php';

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
    <link rel="stylesheet" href="../css/mainlogin.css">
    <link rel="stylesheet" href="../css/util.css">

    <link rel="stylesheet" href="../css/home_page_users.css">

    <!--Para crear la tabla paginada-->
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>

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
                          <li class="menu-active"><a href="home_tecnico.php">Home</a></li>
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
               <div class="wrap-contact2" style="width: 1210px;margin-left: 90px;margin-right: 90px;margin-bottom: 90px;height: 1012px;">
               <span class="contact2-form-title">
                                    Historial de Control de Llamada a Productores
                                </span>

                                <!--<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre..">-->
                                <table data-order='[[ 1, "desc" ]]' data-page-length='10' id="example" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Codigo Productor</th>
                                            <th>Fecha de llamada</th>
                                            <th>Número de llamadas</th>
                                            <th>Resultado llamada</th>
                                            <th>Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query="SELECT b.codigo_productor, a.fecha_llamada, a.numero_llamadas, c.nombre_control_llamada, a.observacion 
                                            FROM `tbl_llamadas` a 
                                            INNER JOIN tbl_productor b on (a.codigo_productor = b.codigo_productor) 
                                            INNER JOIN tbl_control_llamada c on (a.codigo_control_llamada = c.codigo_control_llamada)";
                                            if ($_SESSION["tipo_usuario"] == 3){
                                                $query .= "WHERE A.CODIGO_USUARIO = 3
                                                ORDER BY a.fecha_llamada desc";
                                            } else {
                                                $query .= "ORDER BY a.fecha_llamada desc";
                                            }
                                            $resultado=$link->query($query);
                                            while($row=$resultado->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['codigo_productor']?></td>
                                                <td><?php echo $row['fecha_llamada']?></td>
                                                <td><?php echo $row['numero_llamadas']?></td>
                                                <td><?php echo $row['nombre_control_llamada']?></td>
                                                <td><?php echo $row['observacion']?></td>
                                            </tr>
                                            <?php  
                                            }
                                        ?>
                                    </tbody>
                                </table>

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

    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/easing.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/mainlogin.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "1000px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });

        function modificarLlamada() {
            //confirm("¿Está seguro que desea eliminar el usuario: ....?");
            window.locationf = "modificar_llamadas.html";
        }


        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("example");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>


</body>

</html>