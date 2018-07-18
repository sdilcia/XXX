<?php
include("conexion.php");
$id=$_REQUEST['id_llamada'];

$query="DELETE FROM tbl_llamadas  WHERE codigo_llamada=$id";
$resultado=$conexion->query($query);
if($resultado){
  header("Location:historial_llamadas.php");
}else{
    echo"Error al Eliminar";

}

?>