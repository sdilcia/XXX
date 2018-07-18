<?php

session_start();
include("conexion.php");
if (isset($_POST['txtusuario']) && !empty($_POST['txtusuario']) &&
isset($_POST['txtpw']) && !empty($_POST['txtpw'])
){
 $con= mysql_connect($host,$user,$pw) or die("Problemas con servidor");
 mysql_select_db($db,$con)or die("Problemas con BD");
$consulta= mysql_query("SELECT codigo_tipo_usuario,username, contrasenia FROM tbl_usuario WHERE username='$_POST[txtusuario]'",$con);
$sesion=mysql_fetch_array($consulta);
//echo"consulta buenaa";

if($_POST['txtpw']==$sesion['contrasenia']){
    $_SESSION['USUARIO']= $_POST['txtusuario'];
    //echo"Sesion exitosa";
    //echo$sesion['codigo_tipo_usuario'];
    if($sesion['codigo_tipo_usuario']==2){
    header("Location:tecnico.html");
    }
    if($sesion['codigo_tipo_usuario']==1){
        header("Location:administrador.html");
    }
        if($sesion['codigo_tipo_usuario']==3){
            header("Location:supervisor.html");
        }
}else{
    echo"Combinacion erronea";

}

}

 

?>