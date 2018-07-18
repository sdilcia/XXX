<?php
// Inicializar sesión
session_start();
 
// Si la variable sesión no existe manda al login, luego valida si es técnico
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}else if($_SESSION['tipo_usuario'] == 1){
    header("location: home_admin.php");
    exit;
}else if($_SESSION['tipo_usuario'] == 2){
    header("location: home_supervisor.php");
    exit;
}

require_once 'db.php';

$validation_err = "";
$codigo_productor = "";
$save_productor = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valida campos
    if(empty(trim($_POST["txtnombre"])) ||  empty(trim($_POST["txtapellido"])) || empty(trim($_POST["txtidentidad"])) || 
    empty(trim($_POST["txttelefono1"])) || empty(trim($_POST["txtarea"])) || empty(trim($_POST["txtmunicipio"])) || empty(trim($_POST["txtdepartamento"])) ||
    empty(trim($_POST["txtcomunidad"])) ||  (trim($_POST["cboZona"]) == "-") || (trim($_POST["cboEstado"]) == "-")){
        $validation_err = "Por favor llene todos los campos.";
    } else{
        // Prepare a select statement
        $sql = "SELECT codigo_correlativo FROM tbl_zona WHERE Codigo_zona = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_zona);
            
            // Set parameters
            $param_zona = trim($_POST["cboZona"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $productor);
                    if(mysqli_stmt_fetch($stmt)){
                        $codigo_productor = $productor;
                    }
                    
                } else{
                    $validation_err = "La zona seleccionada no existe. Intente de nuevo mas tarde.";
                }
            } else{
                $validation_err = "Algo salió mal. Intente de nuevo mas tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
        
    // Check input errors before inserting in database
    if(empty($validation_err) && !empty($codigo_productor)){
        $nombre = trim($_POST['txtnombre']);
        $apellido = trim($_POST['txtapellido']);
        $identidad = trim($_POST['txtidentidad']);
        $area = trim($_POST['txtarea']);
        $departamento = trim($_POST['txtdepartamento']);
        $municipio = trim($_POST['txtmunicipio']);
        $comunidad = trim($_POST['txtcomunidad']);
        $organizacion = trim($_POST['txtorganizacion']);
        $zona=$_POST['cboZona'];
        $estado=$_POST['cboEstado'];
        // Prepare an insert statement
        $sql = "INSERT INTO tbl_productor(codigo_productor, codigo_zona, codigo_estado, nombre_productor, apellido_productor, numero_identidad, area, departamento, municipio, comunidad, organizacion)
        VALUES('$codigo_productor','$zona','$estado','$nombre','$apellido','$identidad','$area','$departamento','$municipio','$comunidad','$organizacion')";
         
        if(mysqli_query($link, $sql)){
            $save_productor = "1";
        }else{
            $validation_err = "Algo salió mal. Intente de nuevo mas tarde.";
        }
         
    }

    if(!empty($codigo_productor) && empty($validation_err) && !empty($save_productor)){
        $telefono1 = $_POST['txttelefono1'];
        $sql = "INSERT INTO tbl_telefono(codigo_productor, numeroTelefono) VALUES('$codigo_productor','$telefono1')";
         
        if(mysqli_query($link, $sql)){
        }else{
            $validation_err = "Ha ocurrido un error al guardar el telefono 1. El productor se guardó.";
        }
        
        if(!empty($_POST['txttelefono2'])){
            $telefono2 = $_POST['txttelefono1'];
            $sql = "INSERT INTO tbl_telefono(codigo_productor, numeroTelefono) VALUES('$codigo_productor','$telefono2')";
         
            if(mysqli_query($link, $sql)){
            }else{
                $validation_err = "Ha ocurrido un error al guardar el telefono 2. El productor se guardó.";
            }
        }
    }

    if(!empty($codigo_productor) && empty($validation_err) && !empty($save_productor)){
        $zona = $_POST['cboZona'];
        $sql = "UPDATE tbl_zona SET codigo_correlativo = (num_productores + 1) WHERE (codigo_zona =  '$zona') ";
         
        if ($link->query($sql) === TRUE) {
            header("location: home_tecnico.php");
        } else{
            $validation_err="Algo salió mal. Intente de nuevo mas tarde.";
        } 
         
    }
    
    if(empty($validation_err)){
        mysqli_close($link);
    }
    
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
                        <li class="menu-active">
                            <a href="home_tecnico.php">Home</a>
                        </li>
                        <li>
                            <a href="home_tecnico.php">Iniciar Sesión</a>
                        </li>

                        <li>
                            <a href="#footerSection">Siguenos</a>
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
            <form class="contact2-form validate-form" method="POST">
                <span class="contact2-form-title">
                    Registro de Productores
                </span>

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
                    <b>Número Identidad:</b>
                </div>
                <div class="valor">
                    <input type="text" maxlength="15" name="txtidentidad" class="form-control" placeholder="Ingrese Nº Identidad">
                </div>

                <div class="descripcion">
                    <b>Teléfono:</b>
                </div>
                <div class="valor">
                    <input type="text" name="txttelefono1" class="form-control" placeholder="Ingrese Teléfono 1">
                </div>
                <div class="valor">
                    <input type="text" name="txttelefono2" class="form-control" placeholder="Ingrese Teléfono 2">
                </div>

                <div class="descripcion">
                    <b>Área (Ha):</b>
                </div>
                <div class="valor">
                    <input type="text" maxlength="15" name="txtarea" class="form-control" placeholder="Ingrese cantidad de área">
                </div>

                <div class="descripcion">
                    <b>Departamento:</b>
                </div>
                <div class="valor">
                    <input type="text" maxlength="15" name="txtdepartamento" class="form-control" placeholder="Ingrese Departamento">
                </div>

                <div class="descripcion">
                    <b>Municipio:</b>
                </div>
                <div class="valor">
                    <input type="text" maxlength="15" name="txtmunicipio" class="form-control" placeholder="Ingrese Municipio">
                </div>

                <div class="descripcion">
                    <b>Comunidad:</b>
                </div>
                <div class="valor">
                    <input type="text" maxlength="15" name="txtcomunidad" class="form-control" placeholder="Ingrese Comunidad">
                </div>

                <div class="descripcion">
                    <b>Organizacion</b>
                </div>
                <div class="valor">
                    <input type="text" maxlength="15" name="txtorganizacion" class="form-control" placeholder="Ingrese Organización">
                </div>

                <div class="descripcion">
                    <b>Zona:</b>
                </div>
                <div class="valor">
                    <select class="form-control" name="cboZona">
                        <option value="-">Seleccionar Zona</option>
                        <?php
                            require_once 'db.php';
                            $query="SELECT codigo_zona,nombre_zona  FROM tbl_zona";
                            $resultado=$link->query($query);
                            while($row=$resultado->fetch_assoc()){?>
                                <?php echo $row['codigo_zona'];?>
                                    <option value=" <?php echo $row['codigo_zona']; ?>"><?php echo $row['nombre_zona'];?></option>
                                <?php
                            }
                            $resultado->close(); 
                        ?>
                        
                    </select>
                    </div>

                    <div class="descripcion">
                        <b>Estado:</b>
                    </div>
                    <div class="valor">
                    <select class="form-control" name="cboEstado">
                        <option value="-">Seleccionar Estado</option>
                        <?php
                        require_once 'db.php';
                        $query="SELECT codigo_estado,nombre_estado  FROM tbl_estado";
                            $resultado=$link->query($query);
                            while($row=$resultado->fetch_assoc()){?>
                                <?php echo $row['codigo_zona'];?>
                                    <option value=" <?php echo $row['codigo_estado']; ?>"><?php echo $row['nombre_estado'];?></option>
                                <?php
                            }
                            $resultado->close(); 
                        ?>
                        
                    </select>

                    <div class="container-contact2-form-btn">
                    <div class="wrap-contact2-form-btn">
                        <div class="contact2-form-bgbtn"></div>
                        <input type="submit" value="Registrar" class="btn contact2-form-btn" style="border-color: rgb(6, 26, 6); background: transparent">
                    </div>
                    </div>

                <div class="<?php echo (!empty($validation_err)) ? 'has-error' : ''; ?>" style="color:red">               
                    <br><span class="help-block"><?php echo $validation_err; ?></span>
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