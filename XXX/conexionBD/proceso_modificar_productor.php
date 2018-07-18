<?php
include("conexion.php");
$id=$_REQUEST['id_productor'];
$nombre=$_POST['txtnombre'];
$apellido=$_POST['txtapellido'];
$identidad=$_POST['txtidentidad'];
$area=$_POST['txtarea'];
$departamento=$_POST['txtdepartamento'];
$municipio=$_POST['txtmunicipio'];
$comunidad=$_POST['txtcomunidad'];
$organizacion=$_POST['txtorganizacion'];
//$telefono=$_POST['txtTelefono'];
$estado=$_POST['cboEstado'];
$zona=$_POST['cboZona'];
$query="UPDATE tbl_productor SET codigo_estado='$estado',codigo_zona='$zona',nombre_productor='$nombre',apellido_productor='$apellido',
numero_identidad='$identidad',area='$area',departamento='$departamento',municipio='$municipio',
comunidad='$comunidad',organizacion='$organizacion' WHERE codigo_productor=$id";
$resultado=$conexion->query($query);
if($resultado){
  header("Location:lista_productores.php");
}else{
    echo"Error al Modificar";

}

?>