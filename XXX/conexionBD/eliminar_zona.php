<?php
include("conexion.php");
$id=$_REQUEST['Codigo_zona'];

$query="DELETE FROM tbl_zona  WHERE codigo_zona=$id";
$resultado=$conexion->query($query);
if($resultado){
  header("Location:lista_zonas.php");
}else{
    echo"Error al Eliminar";

}

?>