<?php

session_start();

//Si la sesión lleva inactiva media hora se destruye.
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();    
    session_destroy(); 
}
$_SESSION['LAST_ACTIVITY'] = time(); //Se actualiza el tiempo de la última actividad

// Si la variable sesión existe redirige al home correspondiente
if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
    if($_SESSION['tipo_usuario'] == 1){
        header("location: home_admin.php");
        exit;
    }else if($_SESSION['tipo_usuario'] == 2){
        header("location: home_supervisor.php");
        exit;
    }else if($_SESSION['tipo_usuario'] == 3){
        header("location: home_tecnico.php");
        exit;
    }
}

// Include config file
require_once 'db.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";



 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["user"]))){
        $username_err = 'Por favor ingrese su nombre de usuario.';
    } else{
        $username = trim($_POST["user"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['contrasenia']))){
        $username_err = 'Por favor ingrese su contraseña.';
    } else{
        $password = trim($_POST['contrasenia']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT codigo_usuario, username, contrasenia, codigo_tipo_usuario FROM tbl_usuario WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $codigo_usuario, $username, $hashed_password, $tipo_usuario);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['codigo_usuario'] = $codigo_usuario;
                            $_SESSION['username'] = $username;
                            $_SESSION['tipo_usuario'] = $tipo_usuario;
                            if($tipo_usuario == 1){
                                header("location: home_admin.php");

                            }
                            else if($tipo_usuario == 2){
                                header("location: home_supervisor.php");
                            }
                            else if($tipo_usuario == 3){
                                header("location: home_tecnico.php");
                            }
                                  
                        } else{
                            // Display an error message if password is not valid
                            $username_err = 'Usuario o contraseña incorrectos.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'Usuario o contraseña incorrectos';
                }
            } else{
                echo "Oops! Algo salió mal. Por favor intenta más tarde.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
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
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="login.php">Iniciar Sesión</a>
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
                            Iniciar Sesión
                        </span>

                        <div class="wrap-input2 validate-input" data-validate="Requiere el Usuario: ex@abc.xyz">
                            <input class="input2" type="text" name="user" id="username">
                            <span class="focus-input2" data-placeholder="Usuario"></span>
                        </div>

                        <div class="wrap-input2 validate-input" data-validate="Requiere de una contraseña">
                            <input class="input2" type="password" name="contrasenia" id="contrasenia">
                            <span class="focus-input2" data-placeholder="Contraseña"></span>
                        </div>

                        <div class="container-contact2-form-btn">
                            <div class="wrap-contact2-form-btn">
                                <div class="contact2-form-bgbtn"></div>
                                <input type="submit" value="Iniciar Sesión" onclick="return validar()" class="btn contact2-form-btn" style="border-color: rgb(6, 26, 6); background: transparent">
                            </div>
                        </div>
                        <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" style="color:red">               
                            <br><span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

                <?php
					require("footer.php");
					echo "footer.php";
				?>	

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
    <script src="../js/mainlogin.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/validaciones.js"></script>


</body>

</html>