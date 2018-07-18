<?php
include("conexion.php");
$nombre=$_POST['txtZona'];
$tecnico=$_POST['cboUsuariosTecnicos'];
$query="INSERT INTO tbl_Zona(codigo_tecnico_encargado,nombre_zona) VALUES('$tecnico','$nombre')";
$resultado=$conexion->query($query);
if($resultado){
  header("Location:lista_zonas.php");
}else{
    echo"Error al insertar";

}

?>
