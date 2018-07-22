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
}

if(empty(trim($_GET['id_productor']))){
    header("location: historial_productores.php");
    exit;
} 

require_once 'db.php';

$error_validacion = "";
$llamadas = $contro_llamada = $observaciones = $codigo_productor = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valida campos vacíos 
    if(empty(trim($_POST["txtNumeroLlamadas"]))){
        $error_validacion = 'Por favor ingrese el número de llamadas.';
    } else{
        $llamadas = trim($_POST["txtNumeroLlamadas"]);
    }
    
    if(empty(trim($_POST['estadollamada']))){
        $error_validacion = 'Seleccione una opción de control de llamada.';
    } else{
        $contro_llamada = trim($_POST['estadollamada']);
    }

    if(empty(trim($_GET['id_productor']))){
        header("location: historial_productores.php");
        exit;
    } else{
        $codigo_productor = trim($_GET["id_productor"]);
    }
    

    
    // Valida los campos
    if(empty($error_validacion)){
        $observaciones = trim($_POST["txtobservacion"]);
        $username = $_SESSION["username"];
        $codigo_usuario = $_SESSION["codigo_usuario"];

        $sql = "INSERT INTO tbl_llamadas(fecha_llamada, numero_llamadas, observacion, codigo_productor, codigo_control_llamada, codigo_usuario)
        VALUES((SELECT NOW()),'$llamadas','$observaciones','$codigo_productor','$contro_llamada', '$codigo_usuario')";
         
        if(mysqli_query($link, $sql)){
            header("location: home_admin.php");
        }else{
            $error_validacion = mysqli_error($link);
        }
        
    }
    
    // Cerrar conexión
    mysqli_close($link);
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
            <div class="container-contact2" style="margin-top: 127px">
                <!-- Page Container -->
                <div class="w3-content w3-margin-top" style="max-width:1400px;">

                    <!-- The Grid -->
                    <div class="w3-row-padding">

                        
                        <!-- Right Column  style="width: 935px;"-->
                        <div class="w3-twothird" style="margin-top: 127px">

                            <div class="w3-container w3-card w3-white w3-margin-bottom" style="width: 632px;">
                                <span class="contact2-form-title" style="margin-top: 30px">
                                    Registro de Control de Llamada a Productores
                                </span>
                                <div class="w3-container">
                                    <form class="contact2-form validate-form" method="POST">
                                         
                                    <div class="descripcion">
                                            <b>Productor</b>
                                        </div>
                                        <div class="valor">
                                            <input type="text" name="txtNombreProductor" class="form-control" disabled>
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
                                        </div><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="radio1" value="1" name="estadollamada">
                                            <label class="form-check-label" for="radio1">No respondió</label>
                                        </div><br>
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="radio2" value="2" name="estadollamada">
                                            <label class="form-check-label" for="radio2">Respondió y comercializó</label>
                                        </div><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="radio3" value="3" name="estadollamada">
                                            <label class="form-check-label" for="radio3">Respondió y no comercializó</label>
                                        </div>
                                        
                                        <br>
                                        <br>

                                        <div class="descripcion">
                                            <b>Observaciones:</b>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="observacion" name="txtobservacion"></textarea>
                                        </div>


                                        <div class="container-contact2-form-btn">
                                            <div class="wrap-contact2-form-btn">
                                                <div class="contact2-form-bgbtn"></div>
                                                <input type="submit" value="Registrar llamada" class="btn contact2-form-btn" style="border-color: rgb(6, 26, 6); background: transparent">

                                            </div>
                                        </div>

                                        <div class="<?php echo (!empty($error_validacion)) ? 'has-error' : ''; ?>" style="color:red">               
                                            <br><span class="help-block"><?php echo $error_validacion; ?></span>
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