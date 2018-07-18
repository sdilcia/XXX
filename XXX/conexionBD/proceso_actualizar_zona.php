<?php
include("conexion.php");
$id=$_REQUEST['Codigo_zona'];
$nombre=$_POST['txtZona'];
$tecnico=$_POST['cboUsuariosTecnicos'];
$query="UPDATE tbl_zona SET nombre_zona='$nombre',codigo_tecnico_encargado='$tecnico' WHERE codigo_zona=$id";
$resultado=$conexion->query($query);
if($resultado){
  header("Location:lista_zonas.php");
}else{
    echo"Error al Modificar";

}

?>